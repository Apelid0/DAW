<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'userID', 'ongoinSubjectID'
    ];

    protected $table = 'Teaches';

    public $timestamps = false;

}
