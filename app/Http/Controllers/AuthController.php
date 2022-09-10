<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    const ROLE_USER = 1;
    
        public function register(Request $request){
            try {

            Log::info('User register');

            $validator = Validator::make($request->all(), [
                'full_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'phone'=> 'required|string|max:255',
            ]);
    
    
            if ($validator->fails()) {
                return response()->json($validator->errors()->toJson(), 400);
            }
    
            $user = User::create([
                'full_name' => $request->get('full_name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->password),
                'address' =>  $request->get('address'),
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

            $credentials = $request->only('email', 'password');
            $jwt_token = null;
    
            if (!$jwt_token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Email or Password',
                    ], 401
                );
            }
            
            $user = auth()->user();
            $role = $user->roles;

            return response()->json([
                'success' => true,
                'token' => $jwt_token,
                'access_token' => $jwt_token,
                'token_type' => 'bearer',
                'user' => $user,
                'role' => $role
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

    public function getProfile()
    {   
        $user = auth()->user();
        $role = $user->roles;

        return response()->json([
            'success' => true,
            'token_type' => 'bearer',
            'user' => $user,
            'role' => $role
        ]);
            
    }


    public function logout()
    {
        try{

            Log::info("Logging out session");

            $token = auth();
            JWTAuth::invalidate($token);
            
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);

        } catch (\Exception $exception) {

            Log::error("Error logging out: " . $exception->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);  //status 500
        }
    }

    
    public function updateProfile(Request $request){
        try {

            Log::info(" Update profile ");

            $user_id = auth()->user()->id;

            $user = User::query()->find($user_id);

            $validator = Validator::make($request->all(), [
                'name' => 'string|max:255',
                'email' => 'string|email|max:255|unique:users',
                'password' => 'string|min:8',
            ]);

            if ($validator->fails()) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => $validator->errors()
                    ],
                    400
                );
            }

            $name = $request->input("name");
            $email = $request->input("email");
            $password = $request->input("password");

            if (isset($name)) {
                $user->full_name = $name;
            }

            if (isset($password)) {
                $user->password = bcrypt($password);
            }

            if (isset($email)) {
                $user->email = $email;
            }

            $user->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'User profile updated'
                ],
                201
            );
        } catch (\Exception $exception) {

            Log::error("Error updating profile: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error updating profile'
                ],
                500
            );
        }
    }

    public function deleteProfile() {
        try {

            Log::info(' Delete profile ');

            $user_id = auth()->user()->id;

            $user = User::query()->find($user_id);

            $user->delete();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'User deleted'
                ],
                200
            );

        } catch (\Exception $exception) {

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error deleting user'
                ],
                500
            );
        }
        
    }
} 

