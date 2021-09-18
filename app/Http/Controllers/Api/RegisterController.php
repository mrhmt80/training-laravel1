<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Hash;
use App\User;

class RegisterController extends BaseController
{
    //variabel sukses dan error code
    public $successStatus = 200;
    public $errorStatus = 401;


    public function register(Request $request)
    {
        try 
        {


            if(User::where('email', '=', $request->email)->exists()){

                        $data['status'] = false;
                        $statusCode = $this->errorStatus;
                        $data['code'] = $statusCode;
                        $data['msg'] = 'Email Sudah Ada! Gunakan Email Lain';
                        
                    } else {
                        $user = new User();
                        $user->name = $request->name;
                        $user->email = $request->email;
                        $user->password = Hash::make($request->password);
                        $user->save();

                        $data['status'] = true;
                        $statusCode = $this->successStatus;
                        $data['code'] = $statusCode;

                        $data['user']['token'] = $user->createToken('apilaravelfix')->accessToken;
                        $data['user']['id'] = $user->id;
                        $data['user']['name'] = $user->name;
                        $data['user']['email'] = $user->email;
                    } 


                    return $this->sendResponse($data, $statusCode);

                    
            } catch(\Exception $e) {

            $data['status'] = false;
            $statusCode = $this->errorStatus;
            $data['code'] = $statusCode;
            $data['msg'] = $e->getMessage();

            return $this->sendResponse($data, $statusCode);

        }
    }
}