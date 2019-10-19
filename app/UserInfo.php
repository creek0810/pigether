<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'users';

    public function skills() {
        return $this->hasMany('App\UserSkills', 'account', 'account');
    }
    public function department() {
        return $this->hasOne('App\Department', 'nameEN', 'department');
    }
}
