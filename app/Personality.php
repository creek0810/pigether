<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personality extends Model
{
    //
    protected $table = 'personality';
    protected $visible = ['personality'];

    public function userInfo() {
        return $this->belongTo('App\UserInfo', 'account', 'account');

    }
}