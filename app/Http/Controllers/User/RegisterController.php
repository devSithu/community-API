<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\UserRegisterServiceInterface;
use Auth;
use Response;

class RegisterController extends Controller
{
    
    private $userRegisterService;

    public function __construct(UserRegisterServiceInterface $userRegisterService)
    {
        $this->userRegisterService = $userRegisterService;
    }


    /**
     * go to register page
     *
     * @param [type] 
     * @return void
     */
    public function registerPage()
    {
        return view('user.register');
    }

    /**
     * go to login page
     *
     * @param [type] 
     * @return void
     */
    public function loginPage()
    {
        return view('user.login');
    }

    /**
     * get data for register
     *
     * @param [type] $request
     * @return void
     */
    public function userRegister(Request $request)
    {
        $rules = array(
            'name'    => 'required',
            'email'   => 'required|email|unique:register_users',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }  else {

            $data=$this->userRegisterService->userRegister($request);
            
            if($data == false)
            return back()->with(['status'=>'Password Not Same. Retype Again!']);
            else if(strlen($request->password)<6 || strlen($request->password_confirmation)<6)
            return back()->with(['status'=>'Password Must Be At Least 6 Chatacter. Retype Again!!']);
            else 
            return back()->with(['success'=>"Registeration Success!"]);
        }
        // return $this->userRegisterService->user_register();
    }

    //api_register
    private function appGetUserInfo($request)
    {
        $register_info = new \stdClass();
        $register_info->name = $request->name;
        $register_info->email = $request->email;
        $register_info->password = $request->password;

        return $register_info;
    }
                     
    public function appRegister(Request $request)
    {
        $data=$this->appGetUserInfo($request);
        try {
            if ($this->userRegisterService->appRegister($userInfo)) {
                return Response::json(['statVal' => 1]);
            } else {
                return Response::json(['statVal' => 0]);
            }
        } catch (\Exception $e) {
            return Response::json(['statVal' => 0]);
        }


        // return  $this->userRegisterService->appRegister();
    }

    //close api_register

    /**
     * get data for login
     *
     * @param [type] $request
     * @return void
     */
    public function login(Request $request)
    {
        $rules = array(
            'email'   => 'required|email',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
           return redirect()->back()->withInput()->withErrors($validator);
        } 
        else { 

            $user = $this->userRegisterService->userLogin($request);     //$user = have login email
            if($user == null)
            {
                return redirect()->back()->with(['status'=>'Email Not Found!!']);
            }
            if (!Hash::check($request->password, $user->password)) 
            {
                return redirect()->back()->with(['status'=>'Password not match! Try Again!!']);
            }

            
            Session::put('AUTH', $user);   //insert auth session with login email

            return redirect('/home');
        
        }
    }

    /**
     * logout for web and delete session
     *
     * @param [type] 
     * @return void
     */
    public function logout()
    {
        Session::forget('AUTH');  // delete auth session
        return redirect('/userLogin'); 
    }
}


