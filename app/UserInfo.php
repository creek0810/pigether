<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'users';
    protected $hidden = ['departmentDetail'];
    public function skills() {
        return $this->hasMany('App\UserSkills', 'account', 'account');
    }
    public function departmentDetail() {
        return $this->hasOne('App\Department', 'name_en', 'department');
    }
    public function comments() {
        return $this->hasMany('App\Comment', 'commented_account', 'account');
    }
    public function personality() {
        return $this->hasMany('App\Personality', 'account', 'account');
    }
    public function works() {
        return $this->hasMany('App\Works', 'account', 'account');
    }
}
