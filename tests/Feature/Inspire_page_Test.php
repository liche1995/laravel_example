<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Inspire_page_Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_response_200()
    {
        $response = $this->get('/inspire');

        $response->assertStatus(200);
    }
}
