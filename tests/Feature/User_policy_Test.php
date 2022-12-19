<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

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
    public function test_login_create()
    {
        //make fake login
        $fake_user = User::factory()->create();
        $response = $this->actingAs($fake_user)->get(route('post.create'));
        $response->assertViewIs('post.create');
        $fake_user->delete();
    }
    public function test_non_login_create()
    {
        $response = $this->get(route('post.create'));
        $response->assertRedirect(Route('login'));
    }
    public function test_right_login_update()
    {
        //make fake login
        $fake_user = User::factory()->create();
        //make fake post
        $fake_post = new Post;
        $fake_post->content = " ";
        $fake_post->subjects_id = 0;
        $fake_post->user_id = $fake_user->id;
        $fake_post->save();
        $response = $this->actingAs($fake_user)->get(route("post.edit", ["post"=>$fake_post]));
        $response->assertViewIs('post.edit');
        $fake_post->forceDelete();
        $fake_user->delete();
    }
    public function test_error_login_update()
    {
        //make fake login
        $fake_user = User::factory()->count(2)->create();
        //make fake post
        $fake_post = new Post;
        $fake_post->content = " ";
        $fake_post->subjects_id = 0;
        $fake_post->user_id = $fake_user[0]->id;
        $fake_post->save();
        $fake_user[0]->delete();
        $response = $this->actingAs($fake_user[1])->get(route("post.edit", ["post"=>$fake_post]));
        $response->assertRedirect(route("post.index"));
        $fake_post->forceDelete();
        $fake_user[1]->delete();
    }
    public function test_non_login_update()
    {
        //make fake post
        $fake_post = new Post;
        $fake_post->content = "content";
        $fake_post->subjects_id = 0;
        $fake_post->user_id = 0;
        $fake_post->save();        
        $response = $this->get(route('post.edit', ['post'=>$fake_post]));
        $response->assertRedirect(Route('login'));
        $fake_post->forceDelete();
    }

}

/*note:
1.assert series can't use with 'echo'
*/

?>