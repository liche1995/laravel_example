<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\InspireService;

class Inspire_service_Test extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Service()
    {
        $this->assertIsString((new InspireService())->inspire());
    }
}
