<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'roleID', 'role_name'
    ];

    protected $table = 'Role';

    public $timestamps = false;
    protected $primaryKey = 'roleID';

    public function userRoles(){
        return $this->hasMany('App/UserRole', "roleID", "roleID");
    }
}
