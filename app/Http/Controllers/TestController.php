<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
     public function import(Request $request)
    {
        $file = $request->file;
//        dd($file);
        return ['success' => true];
    }
}
