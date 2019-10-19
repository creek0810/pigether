<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSkills extends Model
{
    protected $table = 'skills';
    protected $visible = ['skill'];

    public function userInfo() {
        return $this->belongsTo('App\UserInfo', 'account', 'account');

    }
}
