<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface {

    /**
     * 获取所有对象
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all() {

        return User::where('id', '>', '0')->get();
    }

}