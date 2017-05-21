<?php

namespace App\Http\Controllers\V1;

//use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        return [];
    }

    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return [];
        //return "aaa";//User::findOrFail($id);
    }
}
