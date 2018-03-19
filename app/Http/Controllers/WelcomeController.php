<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeetingModel;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function welcome(){
        $downloadpdf = MeetingModel::search()->where('MeetingShow', 'Show')->orderBy('MeetingDate', 'des')->paginate(10);
        return view('welcome', ['meetings' => $downloadpdf]);
    }


}
