<?php

namespace App\Services;

use App\Contracts\Dao\CommunityDaoInterface;
use App\Contracts\Services\CommunityServiceInterface;

class CommunityService implements CommunityServiceInterface
{
    private $communityDao;

    /**
     * Class Constructor
     * @param CommunityDaoInterface
     * @return
     */
    public function __construct(CommunityDaoInterface $communityDao)
    {
        $this->communityDao = $communityDao;
    }
    
    /**
     * create user for mobile
     *
     * @param [type] $userInfo
     * @return void
     */
    public function app_createUser($userInfo)
    {
        $userDataArray = array();
        $userData = $this->communityDao->app_createUser($userInfo);
        $userDataArray['token'] = $userData->createToken('community_client')->accessToken;
        $userDataArray['login_id'] = $userData->login_id;

        return $userDataArray;
    }

    /**
     * update user for mobile
     *
     * @param [type] $userInfo
     * @return void
     */
    public function app_updateUser($userInfo)
    {
        return $this->communityDao->app_updateUser($userInfo);
    }

    /**
     * login user for mobile
     *
     * @param [type] $userInfo
     * @return void
     */
    public function app_userLogin($userInfo)
    {
        $userDataArray = array();
        $userData = $this->communityDao->app_userLogin($userInfo);
        if ($userInfo->login_id == $userData->login_id) {
            $token = $userData->createToken('community_client')->accessToken;
            $userDataArray['statVal'] = 1;
            $userDataArray['user_name'] = $userData->user_name;
            $userDataArray['token'] = $token;
            return $userDataArray;
        } else {
            $userDataArray['statVal'] = 0;
            return $userInfo;
        }
    }

    /**
     * change user loginID for mobile
     *
     * @param [type] $userInfo
     * @return void
     */
    public function app_changeLoginID($userInfo, $update_loginID)
    {
        return $this->communityDao->app_changeLoginID($userInfo, $update_loginID);
    }

    /**
     * check user duplicate for mobile
     *
     * @param [type] $userInfo
     * @return void
     */
    public function app_checkDuplicateUser($userInfo)
    {
        return $this->communityDao->app_checkDuplicateUser($userInfo);
    }

    // /**
    //  * get content for mobile
    //  *
    //  * @param [type] $request
    //  * @return void
    //  */
    // public function getTopicContent($request)
    // {
    //     return $this->communityDao->getTopicContent($request);
    // }
}
