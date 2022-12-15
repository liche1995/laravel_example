<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class postcontroller_Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_post_active()
    {
        $test_messagee = "test";
        //simulate html form transfer infomation by post
        $this->post(route("post.store", ["content"=>$test_messagee]));
        $this->assertDatabaseHas("post", ["content"=>$test_messagee]);

    }
    public function test_update_active()
    {
        $test_messagee = "something";
        $post = new Post;
        $post->content = $test_messagee;
        $post->subjects_id = 0;
        $post->save();

        //simulate html form transfer infomation by put
        $this->put(route("post.update", ["post"=>$post, "content"=>$test_messagee]));
        $this->assertDatabaseHas("post", ["content"=>$test_messagee]);
    }
    public function test_soft_delete_active()
    {
        $test_messagee = "dsomething";
        $post = new Post;
        $post->content = $test_messagee;
        $post->subjects_id = 0;
        $post->save();

        $this->delete(route("post.destroy", ["post"=>$post]));
        $this->assertSoftDeleted("post", ["content"=>$test_messagee]);
    }
}
