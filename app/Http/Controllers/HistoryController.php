<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HistoryModel;

class HistoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */ 
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $downloadpdf = HistoryModel::search()->orderBy('TimeStamp', 'des')->paginate(10);
        return view('history', ['histories' => $downloadpdf]);
    }
}
