<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//new line
use App\User;
use Auth;
use Validator;
use Hash;
//tambahan
use App\Http\Controllers\Api\BaseController as BaseController;

class LoginController extends BaseController
{
    //variabel sukses dan error code
    public $successStatus = 200;
    public $errorStatus = 401;


    public function login(Request $request)
    {
        try {

            if(User::where('email', '=', $request->email)->exists()){
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

                    $user = Auth::user();
                    if(Auth::user()->is_active == 1){


                        $data['status'] = true;
                        $statusCode = $this->successStatus;
                        $data['code'] = $statusCode;
                        $data['user']['token'] = $user->createToken('apilaravelfix')->accessToken;
                        $data['user']['id'] = $user->id;
                        $data['user']['name'] = $user->name;
                        $data['user']['email'] = $user->email;
                    } else {
                        $data['status'] = false;
                        $statusCode = $this->errorStatus;
                        $data['code'] = $statusCode;
                        $data['msg'] = 'user bermasalah / belum aktif';
                    } 

                    return $this->sendResponse($data, $statusCode);
                    } else {
                        $data['status'] = false;
                        $statusCode = $this->errorStatus;
                        $data['code'] = $statusCode;
                        $data['msg'] = 'login gagal';
                    }


                    return $this->sendResponse($data, $statusCode);
                }
            } catch(\Exception $e) {

            $data['status'] = false;
                         $statusCode = $this->errorStatus;
                        $data['code'] = $statusCode;
                        $data['msg'] = $e->getMessage();

            return $this->sendResponse($data, $statusCode);

        }
    }
}
