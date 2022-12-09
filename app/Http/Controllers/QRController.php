<?php

namespace App\Http\Controllers;

use App\Models\Kupon;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('qrscan');
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
        $kupon->update([
            'max_use' => $kupon['max_use'] - 1
        ]);
        $kupon->save();
        $transaksi->save();
        return redirect()->route('qr.index')->with('success', 'Kupon berhasil diclaim');
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
            // cek ketersediaan kupon
            $avaiable = Kupon::where('kodeunik', $param[1])->first();
            // sudah pernah pakai belum?
            // $count = Transaksi::join('kupon', 'kupon.id', '=', 'history.id_kupon')
            //     ->where('kupon.kodeunik', $param[1])
            //     ->count();
            if ($avaiable['max_use'] > 0) {
                $user = Transaksi::join('kupon', 'kupon.id', '=', 'history.id_kupon')
                    ->where('history.id_unik', $param[0])
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
        //
    }
}
