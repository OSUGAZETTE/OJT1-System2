<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeetingModel;
use App\HistoryModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use DateTime;

class UploadController extends Controller
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
        return view('upload');
    }

    public function uploadpdf(Request $request){

        //Gets the Input
        $meetingfile = Input::file('meetingfile');
        $meeting_name = Input::get('meeting_name');
        $meetingdate = Input::get('date');
        $venue = Input::get('venue');
        $note = Input::get('note');

        //Validation for both the input in which both of them are required
        $rules = array(
            'meetingfile' => 'required|max:10000|mimes:pdf',
            'meeting_name' => 'required|unique:meeting,MeetingName',
            'date' => 'required|date',
            'venue' => 'required',
        );

        //Check Requirements in rules
        $validator = Validator::make(Input::all(), $rules);
        //If Requirements are not met       
        if($validator->fails()){

            return Redirect::back()->withInput()->withErrors($validator);

        }
        //If requirements are met
        else if($validator->passes()){
            //If it exists
            if(MeetingModel::where('MeetingName','=',request('meeting_name'))->exists()){

                $meetingnamed = MeetingModel::where('MeetingName', 'like', Input::get('meeting_name'))->first();
                
                $number = 0;

                do{
                    $duplicatename = $meeting_name. " " . "(" . ++$number . ")";
                }while($duplicatename == $meetingnamed);

                echo $duplicatename;
            }
            //If it is unique
            else{

                //Change the date format to a stringed format
                $date = DateTime::createFromFormat('Y-m-d', Input::get('date'));
                $usableDate = $date->format('Ymd');
                $logdate = $date->format('Ymd hi');
                $titledate = $date->format('mdY');

                //Path to where pdf are stored. Which is *Project Folder*
                    $destinationPath = '/Meetings/';

                    //Get File selected
                    $meetingfilename = $request->file('meetingfile');
                    $meetingname = Input::get('meeting_name');
                    $filename = $titledate. ' ' .'-' . ' ' . $meetingname . ' ' . '.pdf';

                    //Move file somewhere
                    $meetingfile->move(public_path().$destinationPath,$filename);  

                    //Use for inserting pdf to database
                    $pdfpath = "$destinationPath$filename";

                //insert to database
                $data = array(
                        'MeetingFileName' => $filename,
                        'MeetingName'=> $meeting_name,
                        'MeetingDate' => $usableDate,
                        'Venue' => $venue,
                        'Note' => $note,
                        'MeetingShow' => "Shown"
                );

                //insert to history database
                $data2 = array(
                        'Action' => 'CREATE',
                        'File_Name' => $meeting_name,
                );

                HistoryModel::insert($data2);

                MeetingModel::insert($data);

                return Redirect::back()->with('status', "Successfully uploaded");
            }   
        }

    }

}
