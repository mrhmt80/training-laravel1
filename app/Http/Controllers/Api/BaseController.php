<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($data, $statusCode)
    {
        
        return response()->json([], $statusCode, ['Content-Type' => 'application/json;charset=UTF-8'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}
