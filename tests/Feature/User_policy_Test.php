<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class User_policy_Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_non_login_index()
    {
        $response = $this->get(route('post.index'));
        $response->assertViewIs('post.index');
    }
    /*public function test_login_create()
    {

    }
    public function test_non_login_create()
    {
        $response = $this->get(route('post.create'));
        $response->assertRedrect(Route('login'));
    }
    public function test_login_update()
    {

    }
    public function test_non_login_update()
    {
        $response = $this->get(route('post.update'));
        $response->assertRedrect(Route('login'));
    }*/

}
?>