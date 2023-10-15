<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function postValidates(validation $request) {
        return view('sample.index',['msg'=>'OK']);
    }
}
