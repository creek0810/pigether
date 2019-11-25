<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
    //
    protected $table = 'reviews';
    public function userInfo() {
        return $this->belongsTo('App\UserInfo', 'account', 'account');
    }
}