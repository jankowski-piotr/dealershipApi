<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource as UserResource;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }
    /**
     * index
     *
     */
    public function index(){
        $data = User::all('id','name','email');
        return response([
            'users' => new UserResource($data)
            ], 200);
    }

    /**
     * Show
     *
     */
    public function show($id){
        $data=User::findOrFail($id, ['id','name','email']);
        
        return response([
            'users' => new UserResource($data)
            ], 200);
    }
}
