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
        $LastMeeting = MeetingModel::where('MeetingShow', 'Shown')->orderBy('MeetingDate', 'des')->first();
        return view('welcome', ['meetingno' => $LastMeeting ]);

    }

    public function gazette(){
        $downloadpdf = MeetingModel::search()->where('MeetingShow', 'Shown')->orderBy('MeetingDate', 'des')->paginate(10);
<<<<<<< HEAD
        return view('gazette', ['meetings' => $downloadpdf]);
    }

    public function Search(){
        $msearch = Input::get('month');
        $ysearch = Input::get('year');
        $searched = Input::get('search');


        //100
        if ($msearch != "Month..." && $ysearch == "Year..." && $searched == ""){
            $meetings = MeetingModel::whereMonth('MeetingDate', '=', $msearch)
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('gazette', ['meetings' => $meetings]);
        }
        //010
        elseif ($msearch == "Month..." && $ysearch != "Year..." && $searched == ""){
            $meetings = MeetingModel::whereYear('MeetingDate', '=', $ysearch)
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('gazette', ['meetings' => $meetings]);
        }
        //110
        elseif ($msearch !="Month..." && $ysearch != "Year..." && $searched == ""){
            $meetings = MeetingModel::whereYear('MeetingDate', '=', $ysearch)
                                    ->whereMonth('MeetingDate', '=', $msearch)
                                    ->where('MeetingShow', 'Shown')
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('gazette', ['meetings' => $meetings]);
        }
        //011
        elseif($msearch == "Month..." && $ysearch != "Year..." && $searched != ""){
            $meetings = MeetingModel::search()
                                    ->whereYear('MeetingDate', '=', $ysearch)
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('gazette', ['meetings' => $meetings]);
        }
        //101
        elseif ($msearch !="Month..."&& $ysearch == "Year..." && $searched != ""){
            $meetings = MeetingModel::search()
                                    ->whereMonth('MeetingDate', '=', $msearch)
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('gazette', ['meetings' => $meetings]);
        }
        //111
        elseif ($msearch !="Month..." && $ysearch != "Year..." && $searched != ""){
            $meetings = MeetingModel::search()
                                    ->whereYear('MeetingDate', '=', $ysearch)
                                    ->whereMonth('MeetingDate', '=', $msearch)
                                    ->where('MeetingShow', 'Shown')
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('gazette', ['meetings' => $meetings]);
        }
        //000
        elseif($msearch == "Month..." && $ysearch == "Year..." && $searched == ""){
            return $this->gazette();
        }
        //001
        elseif($msearch == "Month..." && $ysearch == "Year..." && $searched != ""){
            $meetings = MeetingModel::search()
                                        ->where('MeetingShow', 'Shown')
                                        ->orderBy('MeetingDate', 'des')
                                        ->paginate(10);       
            return view('gazette', ['meetings' => $meetings]);
=======
        
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
>>>>>>> fca653f7858ccb9756f6e8e1be82494d8e80abd4
        }
    }
}
