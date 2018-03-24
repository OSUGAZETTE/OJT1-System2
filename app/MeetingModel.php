<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingModel extends Model
{
    protected $table = "meeting";
    protected $primaryKey = 'MeetingID';
    public $timestamps = false;
    

    public function scopeSearch($q)
<<<<<<< HEAD
	{  
       return empty(request()->search) ? $q : 
        $q->where('tags', 'like', '%'.request()->search.'%')
        ->orWhere('MeetingName', 'like', '%'.request()->search.'%')
        ->orWhere('Venue', 'like', '%'.request()->search.'%');
    }
=======
	{
    	return empty(request()->search) ? $q : 
    	$q->where('tags', 'like', '%'.request()->search.'%')
    	->orWhere('MeetingName', 'like', '%'.request()->search.'%')
    	->orWhere('Venue', 'like', '%'.request()->search.'%');
    	// ->orWhere('MeetingDate', 'like', '%'.request()->search.'%')
    	// ->orWhereMonth('MeetingDate', '=', '%'.date('m', strtotime(request()->search)).'%')
    	// ->orWhereSearch('MeetingDate', 'LIKE', '%'.date('YYYY', strtotime(request()->search)).'%');
		}
>>>>>>> fca653f7858ccb9756f6e8e1be82494d8e80abd4
}

