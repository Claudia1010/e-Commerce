<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


class CategoryController extends Controller
{
    public function createCategory(Request $request)
    {
        try {
            Log::info('Creating category');
        
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255', 'min:3'],
                'description' => ['required']
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

            $categoryName = $request->input("name");
            $categoryDescription = $request->input("description");

            $category = new Category();
            
            $category->name = $categoryName;
            $category->description = $categoryDescription;
          
            $category->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'New category created'
                ],
                201
            );
        } catch (\Exception $exception) {

            Log::error("Error creating category: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error creating category'
                ],
                500
            );
        }
    }

}
