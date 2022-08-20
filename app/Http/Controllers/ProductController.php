<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
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
}
