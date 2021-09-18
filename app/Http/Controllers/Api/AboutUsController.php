<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Setting;

class AboutUsController extends BaseController
{
    public $successStatus = 200;
    public $errorStatus = 401;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Setting $settings)
    {
        try 
        {
            $settings->loadAll();

            $about_us = $settings->get('about-us');
            $data['about-us'] = $about_us;


            if($about_us){

                        $data['status'] = true;
                        $statusCode = $this->successStatus;
                        $data['code'] = $statusCode;
                        $data['about-us'] = $about_us;
                        
                    } else {

                        $data['status'] = false;
                        $statusCode = $this->errorStatus;
                        $data['code'] = $statusCode;
                        $data['about-us'] = 'tidak ada data';
                        
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
