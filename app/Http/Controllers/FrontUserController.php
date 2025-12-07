<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\UserSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontUserController extends Controller
{
    function home() {
        
        $subjects = Subject::where('isReady', 1)->take(3)->get();
        return view('front.home', compact('subjects'));
    }

    function about() {
        return view('front.about');
    }
    
    function subject() {
        
        $subjects = Subject::where('isReady', 1)->get();
        return view('front.program', compact('subjects'));
    }
    
    function mySubject() {
        $user = Auth::user();
        $mySubject = UserSubject::where('user_id', $user->id)
                                ->with('subject')
                                ->get();

        return view('front.programSaya', compact('mySubject'));
    }

    function subjectPreview(Subject $subject) {

        $subject->load('materials');

        return view('front.reviewProgram', compact('subject'));
    }

    function material() {
        return view('front.materi');
    }

    function buySubject() {
        
    }
}

