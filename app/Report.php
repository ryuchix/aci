<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
    	'user_id', 'date_posted', 'average'
    ];

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }

    public function department()
    {
        return $this->belongsTo('App\User', 'department_id', 'name'); 
    }
}
