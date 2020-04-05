<?php

namespace App\Contracts\Dao;

interface UserRegisterDaoInterface
{
    public function userRegister($data);
    public function userLogin($loginData);

    //api register
    public function appRegister($registerData);

}
