<?php

namespace App\Http\Controllers;

use App\Exports\TransaksiExport;
use App\Models\Kupon;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == "superadmin") {
            $data = Transaksi::select('history.*', 'users.name as name', 'users.outlet', 'kupon.kodeunik')
                ->join('users', 'users.id', '=', 'history.id_user')
                ->join('kupon', 'kupon.id', '=', 'history.id_kupon')
                ->get();
        } else {
            $data = Transaksi::select('history.*', 'users.name as name', 'users.outlet', 'kupon.kodeunik')
                ->join('users', 'users.id', '=', 'history.id_user')
                ->join('kupon', 'kupon.id', '=', 'history.id_kupon')
                ->where('users.id', Auth::user()->id)
                ->get();
        }

        $kupon = Kupon::all();
        return view('transactions', ['data' => $data, 'kupon' => $kupon]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $avaiable = Kupon::where('kodeunik', $request->kodeunik)->first();
        // sudah pernah pakai belum?
        // $count = Transaksi::join('kupon', 'kupon.id', '=', 'history.id_kupon')
        //     ->where('kupon.kodeunik', $avaiable['kodeunik'])
        //     ->count();
        if ($avaiable['max_use'] > 0) {
            $transaksi = Transaksi::create([
                'id_kupon' => $avaiable['id'],
                'id_user' => Auth::user()->id,
                'id_unik' => $request->id_unik,
                'jenis_mitra' => $request->jenis_mitra,
                'nama_user' => $request->nama_user,
                'no_hp' => $request->no_hp,
            ]);
            $kupon = Kupon::find($avaiable['id']);
            $kupon->update([
                'max_use' => $avaiable['max_use'] - 1,
            ]);
            $kupon->save();
            $transaksi->save();
            return redirect()->route('transaction.index')->with('success', 'Kupon berhasil diclaim');
        } else {
            return redirect()->route('transaction.index')->with('error', 'Kupon sudah habis');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $param = explode(",", $id);
        if (count($param) < 2) {
            $error = [
                'status' => 'error',
                'message' => 'QR CODE tidak valid'
            ];
        } else {
            $user = User::where('email', $param[1])->first();
            if ($user == null) {
                $error = [
                    'status' => 'error',
                    'message' => 'User tidak terdaftar'
                ];
            } else {
                // cek ketersediaan kupon
                $avaiable = Kupon::where('kodeunik', $param[0])->first();
                // sudah pernah pakai belum?
                $count = Transaksi::join('kupon', 'kupon.id', '=', 'history.id_kupon')
                    ->where('kupon.kodeunik', $param[0])
                    ->count();
                if ($avaiable['max_use'] > $count) {

                    $user = Transaksi::join('users', 'users.id', '=', 'history.id_user')
                        ->join('kupon', 'kupon.id', '=', 'history.id_kupon')
                        ->where('kupon.kodeunik', $param[0])
                        ->where('users.email', $param[1])
                        ->count();
                    if ($user == 0) {
                        return response()->json($avaiable);
                    } else {
                        $error = [
                            'status' => 'error',
                            'message' => 'Kupon sudah pernah digunakan'
                        ];
                    }
                } else {
                    $error = [
                        'status' => 'error',
                        'message' => 'Kupon sudah habis / Tidak berlaku'
                    ];
                }
            }
        }


        return response()->json($error);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function excel()
    {
        return Excel::download(new TransaksiExport, 'Transaction-' . Carbon::now() . '.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $kupon = Kupon::find($transaksi->id_kupon);
        $kupon->update([
            'max_use' => $kupon['max_use'] + 1,
        ]);
        $transaksi->delete();
        return redirect()->route('transaction.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
