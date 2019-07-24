<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class task extends Model
{
    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function getRouteKeyName()
    {
        //return parent::getRouteKeyName(); // TODO: Change the autogenerated stub
        return 'task';
    }
}
