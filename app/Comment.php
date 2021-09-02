<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    protected $fillable = [
        'id_user',
        'body',
        'image',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}