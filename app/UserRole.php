<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Roles;
class UserRole extends Model
{
    protected $fillable = [
        'userID', 'roleID'
    ];

    protected $table = 'UserRole';

    public $timestamps = false;

    protected $primaryKey = 'userRoleID';

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function roles(){
        return $this->belongsTo('App\Roles');
    }
}
