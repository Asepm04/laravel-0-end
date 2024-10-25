<?php

namespace App\Services\User;

interface UserService
{
    public function login(string $user,string $pw):string;
}

?>