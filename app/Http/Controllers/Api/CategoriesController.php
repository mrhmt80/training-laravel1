<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Category as CategoryResource;
use App\Models\Category;

class CategoriesController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 401;


    public function index()
    {

        try {


        return CategoryResource::collection(Category::all())->additional(
            [


            'status' => true,
            'code' => $this->successStatus,

        ]
    );
    } catch(\Exception $e) {

            $data['status'] = false;
            $statusCode = $this->errorStatus;
            $data['code'] = $statusCode;
            $data['msg'] = $e->getMessage();

            return $this->sendResponse($data, $statusCode);

        }

   }
}
