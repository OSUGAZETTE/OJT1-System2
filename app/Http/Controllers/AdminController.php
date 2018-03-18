<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeetingModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
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
        $downloadpdf = MeetingModel::search()->orderBy('MeetingDate', 'des')->paginate(10);
        return view('adminwelcome', ['meetings' => $downloadpdf]);
    }

    public function storeCheck(Request $request){
        $meetings = $request->input('meet');
        //$meetings = serialize($meetings); 
        $meetingShow = MeetingModel::find($meetings)->first();
            if (is_array($meetings) || is_object($meetings))
            {
                foreach($meetings as $value){
                    if ($request->input('meet') === '1') {
                        //checked
                        $meetingShow->MeetingShow = '1';
                        $meetingShow->update();
                    }
                    elseif ($request->input('meet') === '0') {
                        //unchecked
                        $meetingShow->MeetingShow = '0';
                        $meetingShow->update();
                    }
                }
            }
        //return Redirect::back();
        dd($meetings);
    }
}
