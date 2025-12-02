<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{ 
    function index() {
        if (!request()->ajax()) {
            return view('admin.user.index');
        }

        // Jika request adalah AJAX (dari JS kita), kirim data JSON
        $users = User::orderBy('id', 'asc')->get();
        return response()->json($users);
    }

    function create() {
        return view('admin.user.create');
    }

    function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'in:user,admin',
        ]);
        
        $request['password'] = bcrypt($request['password']);

        User::create($request->all());
        
        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambah!');

    }

    function show() {
        
    }

    function edit(User $user) {
        return view('admin.user.edit', compact('user'));
    }
    
    function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
            'level' => 'in:user,admin',
        ]);
        // dd($user);
        if (!isset($request['password']) || $request['password'] != '') {
            $user->password = bcrypt($request['password']);
        } 

        $user->name = $request->name;
        $user->email = $request->email;
        $user->whatsapp = $request->whatsapp;
        $user->level = $request->level;
        $user->update();
        
        return redirect()->route('admin.user.index')->with('success', 'User berhasil diubah!');

    }

    function destroy(User $user) {

        User::destroy($user->id);
        return response()->json(['status' => 'User berhasil dihapus!', 'success' =>'User berhasil dihapus!']);

    }
}
