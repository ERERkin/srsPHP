<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $primaryKey = 'post_id';

    protected $fillable = [
        'post_name', 'post_text',
    ];
}
