<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DateApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->refreshDatabase();
        $this->seed('DatabaseSeeder');
    }

    public function test_correct_url()
    {
        $response = $this->get('api/date/2022.07.07');
        $response->assertStatus(200);
    }

    public function test_validation_url()
    {
        $response = $this->get('api/date/x');
        $response->assertStatus(404);
    }

    public function test_validation_url_wrong_day()
    {
        $response = $this->get('api/date/2022.07.50');
        $response->assertStatus(404);
    }

    public function test_validation_url_wrong_month()
    {
        $response = $this->get('api/date/2022.17.10');
        $response->assertStatus(404);
    }

    public function test_check_correct_json()
    {
        $response = $this->get('api/date/2018.08.23');
        $response->assertJson([
            'results' => '3,11,24,25,28,36'
        ]);
        $response->assertStatus(200);
    }

    public function test_check_empty_json()
    {
        $response = $this->get('api/date/2038.08.23');
        $response->assertJson([
            'results' => ''
        ]);
        $response->assertStatus(200);
    }
}
