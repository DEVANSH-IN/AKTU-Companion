<?php

namespace App\Http\Controllers;

use App\Models\PYQ;
use App\Models\Quantum;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function showPYQ(){
        $pyqs = PYQ::all();
        return view('user.pyq',compact('pyqs'));
    }
    public function showQuantums(){
        $quantums = Quantum::all();
        return view('user.quantum',compact('quantums'));
    }
}
