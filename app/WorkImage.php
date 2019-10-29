<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkImage extends Model
{
    //
    protected $table = 'works_image';
    protected $hidden = ['work_id'];
    public function work() {
        return $this.belongsTo('App\Works', 'id', 'work_id');
    }
}
