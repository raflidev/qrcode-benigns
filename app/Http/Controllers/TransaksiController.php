<?php

namespace App\Http\Controllers;

use App\Models\Kupon;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaksi::select('history.*', 'users.name as name', 'users.username', 'kupon.kodeunik')
            ->join('users', 'users.id', '=', 'history.id_user')
            ->join('kupon', 'kupon.id', '=', 'history.id_kupon')
            ->get();

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
        $kupon = Kupon::where('kodeunik', $request->kodeunik)->first();
        $transaksi = Transaksi::create([
            'id_kupon' => $kupon['id'],
            'id_user' => Auth::user()->id,
            'id_unik' => $request->id_unik,
        ]);

        $transaksi->save();
        return redirect()->route('transaction.index')->with('success', 'Kupon berhasil diclaim');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return redirect()->route('transaction.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
