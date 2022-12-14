<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('users', ['data' => $data]);
    }

    public function apiUser($id)
    {
        $data = User::where('id', $id)->get();
        return response()->json($data);
    }

    public function login_index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $customMessages = [
            'required' => ':attribute tidak boleh kosong.'
        ];

        $this->validate($request, $rules, $customMessages);


        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('dashboard')->with('success', 'Login Berhasil');
        }

        return back()->withErrors([
            'wrong' => 'Username atau password anda salah',
        ]);
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
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'outlet' => 'required',
            'role' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'outlet' => $request->outlet,
            'role' => $request->role,
            'password' => bcrypt($request->password),

        ]);

        $user->save();
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahakan');
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
        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'outlet' => $request->outlet,
            'role' => $request->role,
            'password' => bcrypt($request->password)
        ]);

        $user->save();
        return redirect()->route('user.index')->with('success', 'User berhasil diupdate');
    }

    public function update_password(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = User::find(Auth::user()->id);

        if (Auth::attempt(['username' => $user->username, 'password' => $request->old_password])) {
            $user->update([
                'password' => bcrypt($request->new_password)
            ]);

            $user->save();
            return redirect()->route('user.login')->with('success', 'Password berhasil diupdate, silakan login kembali');
        } else {
            return redirect()->route('user.index')->with('error', 'Password lama anda salah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        try {
            $user->delete();
        } catch (\Throwable $e) {
            return redirect()->route('user.index')->with('error', 'User tidak boleh dihapus, Masih ada transaksi yang terkait dengan user');
        }
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login')->with('success', 'Berhasil Logout');
    }
}
