<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    protected $fillable = [
        'user_id','type','amount'
    ] ;

    protected $hidden = [

    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
