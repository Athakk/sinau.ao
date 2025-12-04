<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontUserController extends Controller
{
    function home() {
        return view('front.home');
    }

    function about() {
        return view('front.about');
    }

    function subject() {
        return view('front.program');
    }

    function mySubject() {
        return view('front.programSaya');
    }

    function subjectPreview() {
        return view('front.reviewProgram');
    }

    function material() {
        return view('front.materi');
    }
}
