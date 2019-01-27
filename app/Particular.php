<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Particular extends Model
{
    protected $fillable = [
    	'particular', 'percentage', 'remarks', 'status', 'report_id'
    ];
}
