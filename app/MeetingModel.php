<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingModel extends Model
{
    protected $table = "meeting";
    protected $primaryKey = 'MeetingID';
    public $timestamps = false;
    

    public function scopeSearch($q)
	{
    	return empty(request()->search) ? $q : 
    	$q->where('tags', 'like', '%'.request()->search.'%')
    	->orWhere('MeetingName', 'like', '%'.request()->search.'%')
    	->orWhere('Venue', 'like', '%'.request()->search.'%')
    	->orWhere('MeetingDate', 'like', '%'.request()->search.'%')
    	->orWhere('MeetingDate', 'LIKE', '%'.date('m', strtotime(request()->search)).'%')
    	->orWhere('MeetingDate', 'LIKE', '%'.date('YYYY', strtotime(request()->search)).'%');
		}
}

