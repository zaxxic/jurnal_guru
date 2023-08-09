<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('school_list');
    }

    
}
