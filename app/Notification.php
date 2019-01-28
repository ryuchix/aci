<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
    	'message', 'user_id', 'report_id', 'read'
    ];
}
