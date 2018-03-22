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
use Storage;

class EditDeleteController extends Controller
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
        $downloadpdf = MeetingModel::search()->orderBy('MeetingDate', 'des')->paginate(10);
        return view('edit&delete', ['meetings' => $downloadpdf]);
    }

    public function getdata(){
        $id = $_GET['id'];
        $folderid = MeetingModel::search()->where('MeetingID', $id)->get();
        return response()->json($folderid);
    }

    public function editpdf(Request $request){
        $mid = Input::get('eid');
        $updatemeeting = MeetingModel::find($mid);

        //Validation for both the input in which both of them are required
        $rules = array(
            'meetingfile' => 'max:10000|mimes:pdf',
            'meeting_name' => "required|unique:meeting,MeetingName,$mid,MeetingID",
            'date' => 'required|date',
            'venue' => 'required',
            'meetingshow' => 'required'
        );

        //Check Requirements in rules
        $validator = Validator::make(Input::all(), $rules);
        
        //If Requirements are not met       
        if($validator->fails()){
           return Redirect::back()->withInput()->withErrors($validator);
        }
        else if($validator->passes()){

                //Get Input
                $updatemeeting->MeetingName = Input::get('meeting_name');
                $updatemeeting->MeetingDate = Input::get('date');
                $updatemeeting->Venue = Input::get('venue');
                $updatemeeting->Note = Input::get('note');
                $updatemeeting->MeetingShow = Input::get('meetingshow');
                

                $updateman = Input::file('meetingfile');
                //If the user also uploads a new file
                if($request->hasFile('meetingfile')){

                    //Add the new file
                    $meetingfile = Input::file('meetingfile');

                    //Change the date format to a stringed format
                    $date = DateTime::createFromFormat('Y-m-d', Input::get('date'));
                    $usableDate = $date->format('Ymd');
                    $titledate = $date->format('mdY');

                    //Path to where pdf are stored. Which is *Project Folder*
                    $destinationPath = '/Meetings/';

                    //Get File selected
                    $meetingfilename = $request->File('meetingfile');
                    $meetingname = Input::get('meeting_name');
                    $filename = $titledate. ' ' .'-' . ' ' . $meetingname . ' ' . '.pdf';

                    //Move file somewhere
                    $meetingfile->move(public_path().$destinationPath,$filename);  

                    //Use for inserting pdf to database
                    $pdfpath = "$destinationPath$filename";
                    $oldfilename = $updatemeeting->MeetingFileName;

                    //Update Database
                    $updatemeeting->MeetingFileName = $filename;
                    
                    //Delete old file
                    Storage::delete($oldfilename);
                }

                //If the user changes only the other details
                else if ($updateman == null){
                    //Get the new File Name and Date updated
                    $docuname = Input::get('meeting_name');
                    $date = DateTime::createFromFormat('Y-m-d', Input::get('date'));

                    //Get old filename
                    $oldfilename = $updatemeeting->MeetingFileName;

                    //Path to where pdf are stored. Which is *Project Folder*
                    $destinationPath = '/Meetings/';

                    //Change date format
                    $titledate = $date->format('mdY');
                   
                    //Get the File with the old filename 
                    $histdocu = Storage::get($oldfilename);
                    $histdocuname = basename($histdocu);


                    //Rename the file
                    $filename = $titledate. ' ' .'-' . ' ' . $docuname . '' . '.pdf';

                    //Update the file
                    Storage::move($oldfilename, $filename);

                    //Update Database
                    $updatemeeting->MeetingFileName = $filename;
                }   
                //Save to Database
                $updatemeeting->update();

                $meeting_name = Input::get('meeting_name');

                $data2 = array(
                        'Action' => 'UPDATE',
                        'File_Name' => $meeting_name,
                );

                HistoryModel::insert($data2);

                return Redirect::back()->with('status2', "Successfully edited");
        }   
    }

    public function deleteHistory($MeetingID, Request $request){
        $deletemeeting = MeetingModel::find($MeetingID);

        //Path to where pdf are stored. Which is *Project Folder*
        $destinationPath = '/Meetings/';

        //Name of the file
        $oldfilename = $deletemeeting->MeetingFileName;
        $oldfiletitle = $deletemeeting->MeetingName;

        //Delete the File
        Storage::delete($oldfilename);

        //Delete from database
        $deletemeeting->delete();

        $meeting_name = Input::get('meeting_name');

        $data2 = array(
            'Action' => 'DELETE',
            'File_Name' => $oldfiletitle,
        );

        HistoryModel::insert($data2);

        return Redirect::back()->with('status', "Successfully deleted");
    }
}
