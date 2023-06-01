<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Delivery;
use Tests\TestCase;

class GetOrdersListTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $orderMock = $this->mock(Order::class);
        $orderMock->shouldReceive('all')->andReturn([]);

        $response = $this->get('/api/orders');

        $response->assertStatus(200);
    }
}
