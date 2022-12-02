<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\InspireService;
use App\Http\Controllers\InspireController;

class Inspire_controlletr_Test extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_return_char()
    {   
        /*mock object */
        $mock = \Mockery::mock(InspireService::class);
        $mock->shouldReceive("inspire")->andReturn("名言");

        $InspireController = new InspireController($mock);
        self::assertEquals('名言', $InspireController->inspire());
    }
}
