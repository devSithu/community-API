<?php

namespace App\Dao;

use App\Contracts\Dao\CommunityDaoInterface;
use App\Models\User;
use App\Models\Content;
use App\Models\Introducer;
use Illuminate\Support\Facades\Input;
use DB;

class CommunityDao implements CommunityDaoInterface
{
    /**
     * create user for mobile
     *
     * @param [type] $userInfo
     * @return void
     */
    

    public function app_createUser($userInfo)
    {
        $result = User::where('login_id',$userInfo->connect_sns)->first();
        if($result != null)
        { 
            // if we found the connect person 
            $userData = User::create([
                'login_id'              => $userInfo->login_id,
                'password'              => $userInfo->password,
                'user_type'             => $userInfo->user_type,
                'user_name'             => $userInfo->user_name,
                'gender'                => $userInfo->gender,
                'date_of_birth'         => date('Y-m-d', strtotime($userInfo->date_of_birth)),
                'nrc_number'            => $userInfo->nrc_number,
                'graduated_from'        => $userInfo->graduated_from,
                'graduated_dep'         => $userInfo->graduated_dep,
                'graduated_year'        => $userInfo->graduated_year,
                'region'                => $userInfo->region,
                'address'               => $userInfo->address,
                'phone_number'          => $userInfo->phone_number,
                'email'                 => $userInfo->email,
                'career'                => $userInfo->career,
                'status'                => $userInfo->status,
                'connect_sns'           => $userInfo->connect_sns,
                'operator_type'         => $userInfo->operator_type,
                'nrc_image'             => $userInfo->nrc_image,
                'answer_one'            => $userInfo->answer_one,
                'answer_two'            => $userInfo->answer_two,
                'answer_three'          => $userInfo->answer_three,
                'answer_four'           => $userInfo->answer_four,
                'created_at'            => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at'            => DB::raw('CURRENT_TIMESTAMP'),
            ]);
            $introducer_data = Introducer :: create([
                'user_number'           => $userInfo->login_id,
                'introduced_number'     => $userInfo->connect_sns,
                'charge_code'           => '',
                'status'                => '0',
                'created_at'            => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at'            => DB::raw('CURRENT_TIMESTAMP'),
            ]);
            return $userData;
        }
        else
        {
            // if there is no list for connect person
            $userData = User::create([
                'login_id'              => $userInfo->login_id,
                'password'              => $userInfo->password,
                'user_type'             => $userInfo->user_type,
                'user_name'             => $userInfo->user_name,
                'gender'                => $userInfo->gender,
                'date_of_birth'         => date('Y-m-d', strtotime($userInfo->date_of_birth)),
                'nrc_number'            => $userInfo->nrc_number,
                'graduated_from'        => $userInfo->graduated_from,
                'graduated_dep'         => $userInfo->graduated_dep,
                'graduated_year'        => $userInfo->graduated_year,
                'region'                => $userInfo->region,
                'address'               => $userInfo->address,
                'phone_number'          => $userInfo->phone_number,
                'email'                 => $userInfo->email,
                'career'                => $userInfo->career,
                'status'                => $userInfo->status,
                'connect_sns'           => '0',
                'operator_type'         => $userInfo->operator_type,
                'nrc_image'             => $userInfo->nrc_image,
                'answer_one'            => $userInfo->answer_one,
                'answer_two'            => $userInfo->answer_two,
                'answer_three'          => $userInfo->answer_three,
                'answer_four'           => $userInfo->answer_four,
                'created_at'            => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at'            => DB::raw('CURRENT_TIMESTAMP'),
            ]);
    
            
            
    
            return $userData;
        }
        
    }
    
     

    /**
     * update user for mobile
     *
     * @param [type] $userInfo
     * @return void
     */
    public function app_updateUser($userInfo)
    {
        return User::where('login_id', $userInfo->login_id)
            ->update([
                'password'              => $userInfo->password,
                'user_type'             => $userInfo->user_type,
                'user_name'             => $userInfo->user_name,
                'gender'                => $userInfo->gender,
                'date_of_birth'         => date('Y-m-d', strtotime($userInfo->date_of_birth)),
                'nrc_number'            => $userInfo->nrc_number,
                'graduated_from'        => $userInfo->graduated_from,
                'graduated_dep'         => $userInfo->graduated_dep,
                'graduated_year'        => $userInfo->graduated_year,
                'region'                => $userInfo->region,
                'career'                 => $userInfo->career,
                'status'                 => $userInfo->status,
                'address'               => $userInfo->address,
                'phone_number'          => $userInfo->phone_number,
                'email'                 => $userInfo->email,
                'connect_sns'           => $userInfo->connect_sns,
                'operator_type'         => $userInfo->operator_type,
                'nrc_image'             => $userInfo->nrc_image,
                'updated_at'            => DB::raw('CURRENT_TIMESTAMP'),
            ]);
    }



    /**
     * User Login for mobile
     *
     * @param $userInfo
     * @return void
     */
    public function app_userLogin($userInfo)
    {
        $userData = User::where('login_id', $userInfo->login_id)
                            ->select('user_number', 'login_id', 'user_name')
                            ->first();
        return $userData;
    }

    /**
     * change user loginID for mobile
     *
     * @param [type] $userInfo
     * @return void
     */
    public function app_changeLoginID($userInfo, $update_loginID)
    {
        return User::where('user_number', $userInfo->user_number)
                    ->update(['login_id'=> $update_loginID]);
            
                }

    
    /**
     * Check Register User for mobile
     *
     * @param $userInfo
     * @return void
     */
    public function app_checkDuplicateUser($userInfo)
    {
        $userDataArry = array();
            if(!empty($userInfo->email)) {
                if (User::where('email', '=', Input::get('email'))->exists()) {
                $userDataArry['email'] = $userInfo->email;
                }
            }
            if (User::where('user_name', '=', Input::get('user_name'))->exists()) {
                $userDataArry['user_name'] = $userInfo->user_name;
            }
            if (User::where('nrc_number', '=', Input::get('nrc_number'))->exists()) {
                $userDataArry['nrc_number'] = $userInfo->nrc_number;
            }
        return $userDataArry;
    }

    

    // /**
    //  * get content for mobile
    //  *
    //  * @param $request
    //  * @return void
    //  */
    // public function getTopicContent($request)
    // {
    //     $contentData = DB::table('content')
    //                         ->select('name','profile_bio','title', 'detail', 'content_image', 'image')
    //                         ->get();
    //     return $contentData;
    // }
}