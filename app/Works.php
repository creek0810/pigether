<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Works extends Model
{
    protected $table = 'works';
    public function userInfo() {
        return $this.belongsTo('App\UserInfo', 'account', 'account');
    }
    public function images() {
        return $this->hasMany('App\WorkImage', 'work_id', 'id');
    }
}