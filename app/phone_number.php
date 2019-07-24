<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class phone_number extends Model
{
//    procteted $fillable = ['phone_number',];

    public function user(){
        $this->belongsTo(User::class);
    }
}
