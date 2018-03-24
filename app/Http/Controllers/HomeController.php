<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeetingModel;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
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
        $meetings = MeetingModel::search()->orderBy('MeetingDate', 'des')->paginate(10);
        return view('home', ['meetings' => $meetings]);
    }

    public function dateSearch()
    {
        $msearch = Input::get('month');
        $ysearch = Input::get('year');
        $searched = Input::get('search');


        //100
        if ($msearch != "Month..." && $ysearch == "Year..." && $searched == ""){
            $meetings = MeetingModel::whereMonth('MeetingDate', '=', $msearch)
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('home', ['meetings' => $meetings]);
        }
        //010
        elseif ($msearch == "Month..." && $ysearch != "Year..." && $searched == ""){
            $meetings = MeetingModel::whereYear('MeetingDate', '=', $ysearch)
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('home', ['meetings' => $meetings]);
        }
        //110
        elseif ($msearch !="Month..." && $ysearch != "Year..." && $searched == ""){
            $meetings = MeetingModel::whereYear('MeetingDate', '=', $ysearch)
                                    ->whereMonth('MeetingDate', '=', $msearch)
                                    ->where('MeetingShow', 'Shown')
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('home', ['meetings' => $meetings]);
        }
        //011
        elseif($msearch == "Month..." && $ysearch != "Year..." && $searched != ""){
            $meetings = MeetingModel::search()
                                    ->whereYear('MeetingDate', '=', $ysearch)
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('home', ['meetings' => $meetings]);
        }
        //101
        elseif ($msearch !="Month..."&& $ysearch == "Year..." && $searched != ""){
            $meetings = MeetingModel::search()
                                    ->whereMonth('MeetingDate', '=', $msearch)
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('home', ['meetings' => $meetings]);
        }
        //111
        elseif ($msearch !="Month..." && $ysearch != "Year..." && $searched != ""){
            $meetings = MeetingModel::search()
                                    ->whereYear('MeetingDate', '=', $ysearch)
                                    ->whereMonth('MeetingDate', '=', $msearch)
                                    ->where('MeetingShow', 'Shown')
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('home', ['meetings' => $meetings]);
        }
        //000
        elseif($msearch == "Month..." && $ysearch == "Year..." && $searched == ""){
            return $this->index();
        }
        //001
        elseif($msearch == "Month..." && $ysearch == "Year..." && $searched != ""){
            $meetings = MeetingModel::search()
                                        ->where('MeetingShow', 'Shown')
                                        ->orderBy('MeetingDate', 'des')
                                        ->paginate(10);       
            return view('home', ['meetings' => $meetings]);
        }
    }

    public function dateSearch()
    {
        $msearch = Input::get('month');
        $ysearch = Input::get('year');
        
        if($msearch == "Month" && $ysearch == "1900"){
            return redirect()->route('Home'); 
        }
        elseif ($msearch != "Month" && $ysearch == "1900"){
            $meetings = MeetingModel::whereMonth('MeetingDate', '=', $msearch)
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('home', ['meetings' => $meetings]);
        }
        elseif ( $msearch == "Month" && $ysearch != "1900"){
            $meetings = MeetingModel::whereYear('MeetingDate', '=', $ysearch)
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('home', ['meetings' => $meetings]);
        }
        elseif ( $msearch != "Month" && $ysearch != "1900"){
            $meetings = MeetingModel::whereYear('MeetingDate', '=', $ysearch)
                                    ->whereMonth('MeetingDate', '=', $msearch)
                                    ->orderBy('MeetingDate', 'des')
                                    ->paginate(10);
            return view('home', ['meetings' => $meetings]);
        }
    }
}
