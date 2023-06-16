<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id','type','price','name','description','date','time','location','status','save_used'
    ] ;

    protected $hidden = [

    ];

    public function user (){
        return $this->belongsTo(User::class(),'user_id','id');
    }
}
