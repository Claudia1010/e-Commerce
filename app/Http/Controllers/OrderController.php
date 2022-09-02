<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function addOrder(Request $request)
    {
        try {
            Log::info('Adding order');
        
            $userId = auth()->user()->id;
           
            if (!$userId) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'User not found'
                    ],
                    404
                );
            }

            

            $validator = Validator::make($request->all(), [
                'user_id' => ['required', 'integer'],
                'payment_method_id' => ['required', 'integer'],
                'carrier_id' => ['required', 'integer'],
                'ammount' => ['required'],
                'order_date' => ['required', 'date'],
                'order_email' => ['required', 'string'],
                'order_address' => ['required', 'string'],
                // 'status' => ['required', 'boolean']
                'price' => ['required', 'string'],
                'quantity' => ['required', 'integer'],
                'product_id' => ['required', 'integer']
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
            $orderDate = $request->input("order_date");
            $orderEmail = $request->input("order_email");
            $orderAddress = $request->input("order_address");
            $status = false;
            
            $order = new Order();
            
            $order->user_id = $userId;
            $order->payment_method_id = $paymentMethodId;
            $order->carrier_id = $carrierId;
            $order->ammount = $ammount;
            $order->order_date = $orderDate;
            $order->order_email = $orderEmail;
            $order->order_address = $orderAddress;
            $order->status = $status;

            $order->save();

            //add product to order_product
            $productPrice = $request->input("price");
            $productQuantity = $request->input("quantity");
            $orderId = $order->id;

            //atacar a la tabla orderProduct para guardar el registro del producto del pedido
            $productId = $request->input("product_id");

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

    public function deleteOrderById($orderId){

        try {
        
            Log::info('Deleting order');

            $userId = auth()->user()->id;
           
            if (!$userId) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'User not found'
                    ],
                    404
                );
            }

            $order = Order::find($orderId);

            if (!$orderId) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Missing order"
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

}
