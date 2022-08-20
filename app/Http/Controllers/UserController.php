<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    const ROLE_DEFAULT_USER = 1;
    const ROLE_ADMIN = 2;

    public function userToAdmin($userId) {

        try {
            
            Log::info("Upgrading user to admin");

            $user = User::find($userId);

            if (!$user) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'User not found'
                    ],
                    404
                );
            }

            $user->roles()->attach(self::ROLE_ADMIN);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'User '. $user->name .' promoted to admin'
                ],
                201
            );

        } catch (\Exception $exception) {
            
            Log::error("Error promoting user to admin" . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error promoting user to admin'
                ],
                500
            );
        }
    }

    public function adminToUser($userId){
        try {

            Log::info("Degrading admin to user");

            $user = User::find($userId);

            if(!$user){
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'User not found'
                    ],
                    404
                );
            }

            $user->roles()->detach(self::ROLE_ADMIN);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Admin '. $user->name .' degraded to user'
                ],
                201
            );

        } catch (\Exception $exception) {
            Log::error("Error degrading admin to user" . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error degrading admin to user'
                ],
                500
            );
        }
    }

    public function getAllUsers()
    {
        try {
            Log::info('Getting all users');
            $users = User::all();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Users retrieved successfully',
                    'data' => $users
                ]
            );

        } catch (\Exception $exception) {
            Log::error("Error retrieving users " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error retrieving users'
                ],
                500
            );
        }
    }
}
