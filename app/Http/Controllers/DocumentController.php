<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function getPersonal(){
        $personalData = Personal::all();

        return view('cv_builder', ['personal' => $personalData]);
    }
}
