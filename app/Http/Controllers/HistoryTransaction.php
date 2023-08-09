<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryTransaction extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('history');
    }


    public function search(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

      


        return view('print',  [
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);
    }
}
