<?php

namespace App\Contracts\Services;

interface CommunityServiceInterface
{
    public function app_createUser($userInfo);
    public function app_updateUser($userInfo);
    public function app_checkDuplicateUser($userInfo);
}
