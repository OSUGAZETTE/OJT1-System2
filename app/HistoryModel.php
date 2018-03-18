<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
    protected $table = "history";
    protected $primaryKey = 'History_ID';
    public $timestamps = false;

    public function scopeSearch($q)
	{
    	return empty(request()->search) ? $q : $q->where('File_Name', 'like', '%'.request()->search.'%');
	}
}
