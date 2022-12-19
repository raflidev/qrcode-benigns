<?php

namespace App\Http\Controllers;

use App\Models\Kupon;
use Illuminate\Http\Request;
use PDF;

class KuponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kupon::all();
        return view('coupons', ['data' => $data]);
    }

    public function apiKupon($id)
    {
        $data = Kupon::where('id', $id)->get();
        return response()->json($data);
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
        $request->validate([
            'benefit' => 'required',
            'kodeunik' => 'required|unique:kupon',
            'max_use'  => 'required',
        ]);

        $kupon = Kupon::create([
            'benefit' => $request->benefit,
            'kodeunik' => $request->kodeunik,
            'max_use' => $request->max_use,
        ]);
        $kupon->save();

        return redirect()->route('kupon.index')->with('success', 'Kupon berhasil ditambahkan');
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
    public function update(Request $request)
    {
        $kupon = Kupon::find($request->id);
        $kupon->update([
            'benefit' => $request->benefit,
            'kodeunik' => $request->kodeunik,
            'max_use' => $request->max_use,
        ]);

        $kupon->save();
        return redirect()->route('kupon.index')->with('success', 'Kupon berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kupon = Kupon::find($id);
        try {
            $kupon->delete();
        } catch (\Throwable $e) {
            return redirect()->route('kupon.index')->with('error', 'Kupon tidak boleh dihapus');
        }
        return redirect()->route('kupon.index')->with('success', 'Kupon berhasil dihapus');
    }

    public function generate()
    {
        $kupon = Kupon::all();
        return view('coupons_generate', ['kupon' => $kupon]);

        // $pdf = PDF::loadView('coupons_generate', ['kupon' => $kupon]);
        // return $pdf->download('invoice.pdf');
    }
}
