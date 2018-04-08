<?php

namespace App\Http\Controllers;

use App\Password;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Password::paginate();
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
        $validator = \Validator::make($request->all(),[
            "website" => "required",
            "username" => "required",
            "password" => "required",
        ]);
        
        if($validator->fails()){
            return $this->toResponse($validator->errors());
        }

        if(Password::findByDomain($request->website)){
            return $this->toResponse([
                "message" => "Sorry, You have already created entry by this domain",
                "leval" => "error"
            ]);
        }

        if(Password::create($request->all())){
            return $this->toResponse([
                "message" => "Your New Password Details Saved Successfully",
                "leval" => "success"
            ]);
        }

        return $this->toResponse([
            "message" => "Sorry, Unable to Store Your Request",
            "leval" => "error"
        ]);
    }

    protected function toResponse($data, $responseCode = null)
    {
        if(!is_null($responseCode)){
            return response()->json($data,$responseCode);
        }
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function show(Password $password)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function edit(Password $password)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Password $password)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function destroy(Password $password)
    {
        //
    }
}
