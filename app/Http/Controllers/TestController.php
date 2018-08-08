<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerImportFileRequest;

class TestController extends Controller
{
    public function import(CustomerImportFileRequest $request)
    {
        $file = $request->file;
//        dd($file);
        return ['success' => true];
    }
}
