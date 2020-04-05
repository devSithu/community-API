<?php

namespace App\Http\Controllers;

use App\Contracts\Services\CommunityServiceInterface;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Response;

class CommunityController extends Controller
{

    private $communityService;

    public function __construct(CommunityServiceInterface $communityService)
    {
        $this->communityService = $communityService;
    }

    /**
     * create user for mobile
     *
     * @param Request $request
     * @return void
     */
    public function app_createUser(Request $request)
    {
        $userInfo = $this->appGetUserInfo($request);
        $user = $this->communityService->app_createUser($userInfo);
        return Response::json($user);
    }

    /**
     * getUserInfo for mobile
     *
     * @param [type] $request
     * @return Object
     */
    private function appGetUserInfo($request)
    {
        $path = $request->nrc_image;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/jpeg;base64,' . base64_encode($data);

        $userInfo = new \stdClass();
        $userInfo->user_number = $request->user_number;
        $userInfo->login_id = $request->login_id;
        $userInfo->password = $request->password;
        $userInfo->user_type = $request->user_type;
        $userInfo->user_name = $request->user_name;
        $userInfo->gender = $request->gender;
        $userInfo->date_of_birth = $request->date_of_birth;
        $userInfo->nrc_number = $request->nrc_number;
        $userInfo->graduated_from = $request->graduated_from;
        $userInfo->graduated_dep = $request->graduated_dep;
        $userInfo->graduated_year = $request->graduated_year;
        $userInfo->region = $request->region;
        $userInfo->career = $request->career;
        $userInfo->status = $request->status;
        $userInfo->address = $request->address;
        $userInfo->phone_number = $request->phone_number;
        $userInfo->email = $request->email;
        $userInfo->connect_sns = $request->connect_sns;
        $userInfo->operator_type = $request->operator_type;
        $userInfo->nrc_image = $base64;
        $userInfo->answer_one = $request->answer_one;
        $userInfo->answer_two = $request->answer_two;
        $userInfo->answer_three = $request->answer_three;
        $userInfo->answer_four = $request->answer_four;
        return $userInfo;
    }

    /**
     * update user for mobile
     *
     * @param Request $request
     * @return void
     */
    public function app_updateUser(Request $request)
    {
        $userInfo = $this->appGetUserInfo($request);
        try {
            if ($this->communityService->app_updateUser($userInfo)) {
                return Response::json(['statVal' => 1]);
            } else {
                return Response::json(['statVal' => 0]);
            }
        } catch (\Exception $e) {
            return Response::json(['statVal' => 0]);
        }
    }

    /**
     * user login
     *
     * @param Request $request
     * @return void
     */
    public function app_userLogin(Request $request)
    {
        $userInfo = $this->getLoginID($request);
        try {
            $userData = $this->communityService->app_userLogin($userInfo);
            if ($userData) {
                return Response::json($userData);
            } else {
                return Response::json(['statVal' => 0]);
            }
        } catch (\Exception $e) {
            return Response::json(['statVal' => 0]);
        }
    }

    /**
     * get user loginID
     *
     * @param [type] $request
     * @return void
     */
    public function getLoginID($request)
    {
        $userInfo = new \stdClass();
        $userInfo->login_id = $request->login_id;
        return $userInfo;
    }

    /**
     * change user loginID for mobile
     *
     * @param Request $request
     * @return void
     */
    public function app_changeLoginID(Request $request)
    {
        $userInfo = $this->checkUser($request);
        $update_loginID = $request->login_id;
        try {
            $userData = $this->communityService->app_changeLoginID($userInfo, $update_loginID);
            if ($userData) {
                return Response::json(['statVal' => 1]);
            } else {
                return Response::json(['statVal' => 0]);
            }
        } catch (\Exception $e) {
            return Response::json(['statVal' => 0]);
        }
    }

    /**
     * user register
     *
     * @param Request $request
     * @return void
     */
    public function app_checkDuplicateUser(Request $request)
    {
        $userInfo = $this->getRegisterData($request);
        $userData = $this->communityService->app_checkDuplicateUser($userInfo);
        return Response::json($userData);
    }

    /**
     * get user registerData
     *
     * @param [type] $request
     * @return void
     */
    public function getRegisterData($request)
    {
        $userInfo = new \stdClass();
        $userInfo->login_id = $request->login_id;
        $userInfo->user_name = $request->user_name;
        $userInfo->email = $request->email;
        $userInfo->nrc_number = $request->nrc_number;
        return $userInfo;
    }

    /**
     * check user for mobile
     *
     *
     * @return void
     */
    public function authCheckUser()
    {
        $user = Auth::user();
        $profileCols = config('constants.USER_PROFILE_COLUMNS');
        if ($user) {
            return Response::json([
                'success' => true,
                'userData' => $user->only($profileCols),
            ]);
        }
        return Response::json(['success' => false]);
    }

    /**
     * revoke user for mobile
     *
     *
     * @return void
     */
    public function revokeUserAuth()
    {
        Auth::user()->token()->delete();
    }

    // /**
    //  * get content for mobile
    //  *
    //  * @param [type] $request
    //  * @return void
    //  */
    // public function getTopicContent(Request $request)
    // {
    //     return $this->communityService->getTopicContent($request);
    // }

    public $successStatus = 200;

    public function checkToken()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function checkUser($request)
    {
        $user = Auth::user();
        return $user;
    }
}
