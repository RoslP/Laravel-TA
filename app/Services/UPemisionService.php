<?php

namespace App\Services;

use App\Models\User;

class UPemisionService
{
    private $permission =['admin'];
    public function hasPermission(User $user): bool
    {

       return in_array($user->role,$this->permission);
    }
}
