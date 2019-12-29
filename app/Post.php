<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'account', 'title', 'content', 'created_at', 'updated_at',
    ];
    protected $table = 'post';
}
