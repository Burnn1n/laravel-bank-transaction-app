<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // student huudasnii oyutnii code link deer darah uyd daragdsan code-nii utgii huudasdaa oortoo damjuulna
    public function get($acc_number)
    {
        return view('acc_trans',compact('acc_number'));
    }
}
