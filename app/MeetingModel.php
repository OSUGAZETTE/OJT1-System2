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
    	return empty(request()->search) ? $q : $q->where('meetingname', 'like', '%'.request()->search.'%');
	}
}
