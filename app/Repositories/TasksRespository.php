<?php

namespace App\Repositories;

use App\User;

class TaskRepository
{
    public function forUser(user $user){
        return $user->user()->tasks()->orderBy('created_at','desc')->get();
    }
}
