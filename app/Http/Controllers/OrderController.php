<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function addOrder(Request $request)
    {
        try {
            Log::info('Adding order');
        
            $userId = auth()->user()->id;
           
            $validator = Validator::make($request->all(), [
                'user_id' => ['required', 'integer'],
                'payment_method_id' => ['required', 'integer'],
                'carrier_id' => ['required', 'integer'],
                'ammount' => ['required'],
                'products' => 'required|array',
                'products.*.product_id' => 'required',
                'products.*.price' => 'required',
                'products.*.quantity' => 'required'
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

            $userId = $request->input("user_id");
            $paymentMethodId = $request->input("payment_method_id");
            $carrierId = $request->input("carrier_id");
            $ammount = $request->input("ammount");
            $status = false;
            
            $order = new Order();
            
            $order->user_id = $userId;
            $order->payment_method_id = $paymentMethodId;
            $order->carrier_id = $carrierId;
            $order->ammount = $ammount;
            $order->status = $status;

            $order->save();


            $products = $request->input("products");

            foreach ($products as $product) {
                $product = Product::find($product['product_id']);
 
                if (!$product) {
                    return [
                        'success' => false,
                        'message' => "The product doesn't exist"
                    ];
                }

                $order->products()->attach($product['product_id'],
                [
                    'price' => $product['price'],
                    'quantity' => $product['quantity']
                ]);
            }

            return response()->json(
                [
                    'success' => true,
                    'message' => 'New order added'
                ],
                201
            );
        } catch (\Exception $exception) {

            Log::error("Error adding order: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error adding order'
                ],
                500
            );
        }
    }

    public function getOrders()
    {
        try {

            Log::info("Getting Orders from the user");

            $userId = auth()->user()->id;

            $orders = Order::query()
            ->where('user_id', '=', $userId)
            ->with('products')
            ->get()
            ->toArray();

            
            if (!$orders) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => "You don't have any order yet"
                    ],
                    404
                );
            };

            return response()->json(
                [
                    'success' => true,
                    'message' => "Getting orders from user ".$userId,
                    'data' => $orders
                ],
                200
            );

        } catch (\Exception $exception) {

            Log::error("Error getting orders: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error getting orders from user ".$userId
                ],
                500
            );
        }
    }

    public function deleteOrderById($orderId){

        try {
        
            Log::info('Deleting order');

            $userId = auth()->user()->id;

            $order = Order::find($orderId);

            if (!$orderId) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Missing order"
                    ]
                );
            }

            if ($order->user_id != $userId) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Invalid User'
                    ]
                );
            }

            $order->delete();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Order deleted'
                ],
                200
            );

        } catch (\Exception $exception) {

            Log::error("Error deleting order: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error deleting order'
                ],
                500
            );
        }
    }

    public function getAllOrders()
    {
        try {
            Log::info('Getting all orders');

            $orders = Order::with('products')
            ->get()
            ->toArray();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Orders retrieved successfully',
                    'data' => $orders
                ]
            );

        } catch (\Exception $exception) {
            Log::error("Error retrieving orders " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error retrieving orders'
                ],
                500
            );
        }
    }
    
    public function changeOrderStatus($orderId){

        try {
        
            Log::info('Changing order status');

            $order = Order::find($orderId);

            if (!$orderId) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Missing order"
                    ]
                );
            }

            $order->status = true;
            $order->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Order status changed',
                    'data'=> $order
                ],
                200
            );

        } catch (\Exception $exception) {

            Log::error("Error changing order status: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error changing order status'
                ],
                500
            );
        }
    }

}
