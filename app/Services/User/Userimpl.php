<?php

namespace App\Services\User;
use App\Services\User\UserService;

class Userimpl implements UserService
{
    private array $user = ["yadi"=>"ok"];

    
    public function login(string $user,string $pw):string
    {

        if(!isset($this->user[$user]))
        {
            return false;
        }

        $corretpw = $this->user[$user];
        return $pw == $corretpw;
        
    }

}

?>