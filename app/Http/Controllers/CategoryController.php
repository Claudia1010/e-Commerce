<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


class CategoryController extends Controller
{
    public function addCategory(Request $request)
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

    public function updateCategoryById(Request $request, $id){
    
        try {

            Log::info('Updating category');
            
            $adminId = auth()->user()->id;

            $category = Category::find($id);
            
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

            $categoryName = $request->input('name');

            $categoryDescription = $request->input('description');

            $category->name = $categoryName;

            $category->description = $categoryDescription;

            $category->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Category updated',
                    'data' => $category
                ],
                201
            );
        } catch (\Exception $exception) {

            Log::error("Error updating category: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error updating category'
                ],
                500
            );
        }
    }

    public function deleteCategoryById($categoryId){

        try {
        
            Log::info('Deleting category');

            $adminId = auth()->user()->id;

            $category = Category::find($categoryId);

            if (!$category) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Missing category"
                    ]
                );
            }

            $category->delete();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Category deleted'
                ],
                200
            );

        } catch (\Exception $exception) {

            Log::error("Error deleting category: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error deleting category'
                ],
                500
            );
        }
    }

    public function getCategories()
    {
        try {
            Log::info('Getting all categories');
            $categories = Category::all();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Categories retrieved successfully',
                    'data' => $categories
                ]
            );

        } catch (\Exception $exception) {
            Log::error("Error retrieving categories " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error retrieving categories'
                ],
                500
            );
        }
    }
}
