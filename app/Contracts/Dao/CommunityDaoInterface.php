<?php

namespace App\Contracts\Dao;

interface CommunityDaoInterface
{
    public function app_createUser($userInfo);
    public function app_updateUser($userInfo);
    public function app_checkDuplicateUser($userInfo);
}
