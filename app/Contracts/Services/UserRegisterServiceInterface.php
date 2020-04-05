<?php

namespace App\Contracts\Services;

interface UserRegisterServiceInterface
{
   public function userRegister($data);
   public function userLogin($loginData);

   //api register
   public function appRegister($registerData);
}
