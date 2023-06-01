<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Mockery\MockInterface;
use stdClass;
use Tests\TestCase;

class GetOrderTest extends TestCase
{
    /**
     * A basic test example.
     */
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        // Создаем заглушку Order
        $order = new Order();
        $order->id = 1;
        $order->sender_address = 'sender_address';
        $order->receiver_address = 'receiver_address';

        // Создаем мок Order и указываем ожидаемое поведение
        $orderMock = $this->mock(Order::class);
        $orderMock->shouldReceive('all')->andReturn(collect([$order]));

        // Выполняем запрос
        $response = $this->get('/api/orders');

        // Проверяем успешный ответ
        $response->assertStatus(200);
    }
}
