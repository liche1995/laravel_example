<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    /*public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }*/
    public function testExample()
    {
        //make fake login
        $fake_user = User::factory()->create();
        $this->browse(function (Browser $browser) use($fake_user)
        {
            //$browser->visit('http://localhost:8000/login')->dump();
            $browser->visit('http://localhost:8000/login')
            ->type('email', $fake_user->email)
            ->type('password', 'password')//need to solve
            ->press('Login')
            ->assertPathIs('http://localhost:8000/home');
        }
        );
        $fake_user->delete();
    }
}
?>