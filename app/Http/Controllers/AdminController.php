<?php

namespace App\Http\Controllers;

use App\Models\Kupon;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $greet = "";
        $hour = Carbon::now()->timezone('Asia/Jakarta')->format('H');
        if ($hour < 12) {
            $greet = 'Good morning';
        } else if ($hour < 17) {
            $greet = 'Good afternoon';
        } else {
            $greet = 'Good evening';
        }

        $user = User::all()->count();
        $transaction = Transaksi::all()->count();
        $coupon = Kupon::all()->count();

        return view('dashboard', ['greet' => $greet, 'user' => $user, 'transaction' => $transaction, 'coupon' => $coupon]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
