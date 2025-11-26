<?php

namespace App\Http\Controllers;

use App\Models\UserSubject;
use Illuminate\Http\Request;

class UserSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!request()->ajax()) {
            return view('admin.histori.index');
        }
        
        // Jika request adalah AJAX (dari JS kita), kirim data JSON
        $data = UserSubject::with(['user', 'subject'])->orderBy('id', 'desc')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserSubject $userSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserSubject $userSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserSubject $userSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserSubject $userSubject)
    {
        //
    }
}
