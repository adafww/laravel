<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrderResource::collection(Order::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        $created_order = Order::create($request->validated());

        return new OrderResource($created_order);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new OrderResource(Order::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


// Создание объектов моделей
//        $customer = new User($userName, $userEmail);
//        $order = new Order();
//        $order->senderAddress = $senderAddress->input('senderAddress');
//        $order->receiverAddress = $receiverAddress->input('receiverAddress');
//        $order->userId = $userId->input('userId');

//        $order->senderAddress = 'senderAddress';
//        $order->receiverAddress = 'receiverAddress';
//        $order->userId = 1;
// Сохранение заказа в базе данных
//        error_log($order);
//        $order->save();
//        error_log($order);
//        // Возвращаем созданный заказ
//        return response()->json([
//            'message' => 'Запись успешно создана',
//            'record' => $order
//        ]);
