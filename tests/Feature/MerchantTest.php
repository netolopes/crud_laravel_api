<?php

namespace Tests\Feature;

use App\Models\Merchant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MerchantTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_merchants()
    {
        $response = $this->getJson('/');

        $response->assertStatus(200);
    }

    public function test_get_merchant()
    {
        $merchant = Merchant::factory()->create();

        $response = $this->getJson("merchant/show/2");

        $response->assertStatus(200);
    }
}
