<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Messeges
     *
     * @var array
     */
    public $messages = [
        'registerAdminNotAllowed' => 'Admin user cannot be created, only promoted.',
        'invalidCredentials' => 'Invalid credentials!',
        'userCreated' => 'User created.',
     ];
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(), User::$validationRules, $this->messages);
        if ($validator->fails()) {
            return response(['message' => $validator->getMessageBag()],401);
        }
        // Make sure admin cannot be registered - only promoted
        if($request->role === 'admin'){
            return response(['message' => $this->messages['registerAdminNotAllowed']],403);
        }
        $validatedData = $request->all();
        $validatedData['password'] = bcrypt($request->password);

        User::create($validatedData);
        
        return response(['message' => $this->messages['userCreated']],200);

    }

    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(), [
                'email' => 'email|required',
                'password' => 'required'
            ], $this->messages);
        if ($validator->fails()) {
            return response(['message' => $validator->getMessageBag()],401);
        }

        if (!auth()->attempt($request->all())) {
            return response([
                'message' => $this->messages['invalidCredentials'],
            ],401);
        }
        
        // Access token generated each time this method is invoked
        // This is for demonstratation purposes only
        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response([
            'user' => auth()->user(),
            'accessToken' => $accessToken
        ],200);

    }
}