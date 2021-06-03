<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileUpload extends Controller
{

    public function index() {

        $allMedia = File::all();

        return view('welcome', ['data' => $allMedia->toArray()]);

    }

}
