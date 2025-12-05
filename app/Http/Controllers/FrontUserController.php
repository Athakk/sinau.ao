<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\UserSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontUserController extends Controller
{
    function home() {
        $subject = Subject::take(3);
        
        return view('front.home', compact('subject'));
    }
    
    function about() {
        return view('front.about');
    }
    
    function subject() {
        $subject = Subject::get();
    
        return view('front.program', compact('subject'));
    }

    function mySubject() {
        $user = Auth::user();
        $mySubject = UserSubject::where('user_id', $user->id)->with('subject')->get();

        return view('front.programSaya', compact('mySubject'));
    }

    function subjectPreview(Subject $subject) {

        return view('front.reviewProgram');
    }

    function material() {
        return view('front.materi');
    }

    function buySubject() {
    }
}
