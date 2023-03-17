<?php

namespace App\Repositories;


use App\Models\Certificate;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function allUsers()
    {
        return User::with(['certificate','userMeta'])->latest()->get();
    }

    public function storeUser($data)
    {

        $user = User::create($data);
        if ($user && $data['type'] == 'third') {
            $user->userMeta()->create($data);
        } elseif ($user && $data['type'] == 'second') {
            $certificate = Certificate::find($data['certificate_id']);
            $certificate->update(['user_id' => $user->id]);

        }
        return $user;

    }

}
