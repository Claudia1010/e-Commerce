<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function getProducts()
    {
        try {
            Log::info('Getting all products');
            $products = Product::all();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Products retrieved successfully',
                    'data' => $products
                ]
            );

        } catch (\Exception $exception) {
            Log::error("Error retrieving products " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error retrieving products'
                ],
                500
            );
        }
    }

    public function addProduct(Request $request)
    {
        try {
            Log::info('Adding product');
        
            $validator = Validator::make($request->all(), [
                'category_id' => ['required', 'integer'],
                'name' => ['required', 'string', 'max:255', 'min:3'],
                'artist' => ['required', 'string', 'max:255', 'min:3'],
                'year' => ['required', 'integer'],
                'price' => ['required'],
                'description' => ['required'],
                'image' => ['required', 'string'],
                'stock' => ['required', 'integer'],
                'create_date' => ['required', 'date'],
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

            $categoryId = $request->input("category_id");
            $productName = $request->input("name");
            $productArtist = $request->input("artist");
            $productYear = $request->input("year");
            $productPrice = $request->input("price");
            $productDescription = $request->input("description");
            $productImage = $request->input("image");
            $productStock = $request->input("stock");
            $productUpload = $request->input("create_date");

            $product = new Product();
            
            $product->category_id = $categoryId;
            $product->name = $productName;
            $product->artist = $productArtist;
            $product->year = $productYear;
            $product->price = $productPrice;
            $product->description = $productDescription;
            $product->image = $productImage;
            $product->stock = $productStock;
            $product->create_date = $productUpload;

            $product->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'New product added'
                ],
                201
            );
        } catch (\Exception $exception) {

            Log::error("Error adding product: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error adding product'
                ],
                500
            );
        }
    }

    public function updateProductById(Request $request, $id){
    
        try {

            Log::info('Updating product');
            
            $adminId = auth()->user()->id;
           
            if (!$adminId) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'User not found'
                    ],
                    404
                );
            }

            $product = Product::find($id);
            
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255', 'min:3'],
                'artist' => ['required', 'string', 'max:255', 'min:3'],
                'year' => ['required', 'integer'],
                'price' => ['required'],
                'description' => ['required'],
                'image' => ['required', 'string'],
                'stock' => ['required', 'integer'],
                'create_date' => ['required', 'date'],
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

            $categoryId = $request->input("category_id");
            $productName = $request->input("name");
            $productArtist = $request->input("artist");
            $productYear = $request->input("year");
            $productPrice = $request->input("price");
            $productDescription = $request->input("description");
            $productImage = $request->input("image");
            $productStock = $request->input("stock");
            $productUpload = $request->input("create_date");

            $product->category_id = $categoryId;
            $product->name = $productName;
            $product->artist = $productArtist;
            $product->year = $productYear;
            $product->price = $productPrice;
            $product->description = $productDescription;
            $product->image = $productImage;
            $product->stock = $productStock;
            $product->create_date = $productUpload;

            $product->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Product updated',
                    'data' => $product
                ],
                201
            );
        } catch (\Exception $exception) {

            Log::error("Error updating product: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error updating product'
                ],
                500
            );
        }
    }

    public function deleteProductById($productId){

        try {
        
            Log::info('Deleting product');

            $adminId = auth()->user()->id;
           
            if (!$adminId) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Admin not found'
                    ],
                    404
                );
            }

            $product = Product::find($productId);

            if (!$product) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Missing product"
                    ]
                );
            }

            $product->delete();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Product deleted'
                ],
                200
            );

        } catch (\Exception $exception) {

            Log::error("Error deleting product: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error deleting product'
                ],
                500
            );
        }
    }

    public function getProductById($productId){

        try {
        
            Log::info('Getting product by Id');

            // $adminId = auth()->user()->id;
           
            // if (!$adminId) {
            //     return response()->json(
            //         [
            //             'success' => false,
            //             'message' => 'Admin not found'
            //         ],
            //         404
            //     );
            // }

            $product = Product::find($productId);

            if (!$product) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Missing product"
                    ]
                );
            }

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Product retrieved',
                    'data' => $product
                ],
                200
            );

        } catch (\Exception $exception) {

            Log::error("Error getting product: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error getting product'
                ],
                500
            );
        }
    }

}
