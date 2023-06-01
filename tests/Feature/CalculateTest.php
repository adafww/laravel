<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Delivery;
use Tests\TestCase;

class CalculateTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $deliveryMock = $this->mock(Delivery::class);
        $deliveryMock->shouldReceive('getAttribute')->andReturn(1234);

        $response = $this->get('/api/calculate?order_id=1&sender_address=sender_address&receiver_address=receiver_address');

        $response->assertStatus(200)->assertJsonIsObject();
    }
}
