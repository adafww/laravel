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

class CreateOrderTest extends TestCase
{
    /**
     * A basic test example.
     */
    use RefreshDatabase;

    public function test_create_order(): void
    {
        $data = [
            'user_id' => 1,
            'sender_address' => 'sender_address',
            'receiver_address' => 'receiver_address',
        ];

        // Отправляем POST-запрос с данными
        $response = $this->post('/api/orders', $data);

        // Проверяем успешный ответ
        $response->assertStatus(201);

        // Проверяем создание заказа в базе данных
        $this->assertDatabaseHas('orders', $data);
    }
}
