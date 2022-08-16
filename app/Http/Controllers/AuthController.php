<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    const ROLE_USER = 1;
    
        public function register(Request $request){
            try {

            Log::info('User register');

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'address' => 'required|string|max:255',
                'default_shipping_address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'phone'=> 'required|string|max:255',
            ]);
    
    
            if ($validator->fails()) {
                return response()->json($validator->errors()->toJson(), 400);
            }
    
            $user = User::create([
                'full_name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->password),
                'address' =>  $request->get('address'),
                'default_shipping_address' =>  $request->get('default_shipping_address'),
                'city' =>  $request->get('city'),
                'phone'=>  $request->get('phone'),
            ]);
    
            $user->roles()->attach(self::ROLE_USER);
    
            $token = JWTAuth::fromUser($user);
    
            return response()->json(compact('user'), 201);


        } catch (\Exception $exception) {

            Log::error("Error registering user: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error registering user'
                ],
                500
            );
        }    

    }


    public function login(Request $request)
    {
        try {

            Log::info('Login user');

            $input = $request->only('email', 'password');
            $jwt_token = null;
    
            if (!$jwt_token = JWTAuth::attempt($input)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Email or Password',
                ], Response::HTTP_UNAUTHORIZED);
            }
    
            return response()->json([
                'success' => true,
                'token' => $jwt_token,
            ]);

        } catch (\Exception $exception) {
            
            Log::error("Error on user login: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error on user login'
                ],
                500
            );
        }
    }

}

