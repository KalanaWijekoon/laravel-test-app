<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Str;

class UserService {

    public function create(array $userData):User
    {

        //Converting request fields in to column names (snake case) using snake function
        $filedCorrectedData = [];
        foreach ($userData as $k => $v){
            $filedCorrectedData[Str::snake($k)] = $v;
        }

        $user = User::create($filedCorrectedData);

        return $user;

    }

}

