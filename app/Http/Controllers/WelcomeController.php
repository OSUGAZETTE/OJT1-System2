<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeetingModel;
use Illuminate\Support\Facades\Input;

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
        $downloadpdf = MeetingModel::search()->where('MeetingShow', 'Shown')->orderBy('MeetingDate', 'des')->paginate(10);
        
        return view('welcome', ['meetings' => $downloadpdf]);
    }

    public function dateSearch()
    {
        $msearch = Input::get('month');
        $ysearch = Input::get('year');
        
        if($msearch == "Month" && $ysearch == "1900"){
            return redirect()->route('Welcome'); 
        }
        elseif ($msearch != "Month" && $ysearch == "1900"){
            $meetings = MeetingModel::whereMonth('MeetingDate', '=', $msearch)
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('welcome', ['meetings' => $meetings]);
        }
        elseif ( $msearch == "Month" && $ysearch != "1900"){
            $meetings = MeetingModel::whereYear('MeetingDate', '=', $ysearch)
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('welcome', ['meetings' => $meetings]);
        }
        elseif ( $msearch != "Month" && $ysearch != "1900"){
            $meetings = MeetingModel::whereYear('MeetingDate', '=', $ysearch)
                                    ->whereMonth('MeetingDate', '=', $msearch)
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('welcome', ['meetings' => $meetings]);
        }
    }
}
