<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    //
       protected $fillable = [
        'file', 'number', 'status','show_date','showed_times','remain_times'
    ];

}
