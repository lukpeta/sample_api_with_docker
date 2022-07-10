<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NumberApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->refreshDatabase();
        $this->seed('DatabaseSeeder');
    }

    public function test_number_correct_url()
    {
        $response = $this->get('api/number/49');
        $response->assertStatus(200);
    }

    public function test_number_validation_url()
    {
        $response = $this->get('api/number/txt');
        $response->assertStatus(404);
    }

    public function test_number_check_empty_json()
    {
        $response = $this->get('api/number/49999');
        $response->assertJsonFragment([
            'number_of_repeats' => 0,
            'dates' => []
        ]);
        $response->assertStatus(200);
    }

    public function test_number_check_corect_return_json()
    {
        $response = $this->get('api/number/49');
        $this->assertNotEmpty($response->json('dates'));
        $this->assertNotNull(0);
        $response->assertStatus(200);
    }
}
