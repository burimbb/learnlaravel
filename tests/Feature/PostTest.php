<?php

namespace Tests\Feature;

use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * @test
     */
    public function it_fetch_all_posts()
    {
        create('App\Post');
        
        $response = $this->getJson('/api/posts');
        $response->assertOk();
    }
    
    /**
     * @test
     */
    public function it_fetch_single_post()
    {
        $post = create('App\Post');

        $response = $this->getJson('/api/posts/'.$post->id);
        $response->assertOk();

        $response->assertSee('title');
        $response->assertSee('body');
    }

    /**
     * @test
     */
    public function its_404_if_a_post_not_foud()
    {
        $this->getJson('api/posts/500')
            ->assertNotFound();
    }

    /**
     * @test
     */
    public function it_creates_new_post_if_valid_parameters()
    {
        $this->actingAs(create('App\User'));
        $post = make('App\Post');

        $this->postJson('api/posts', $post->toArray())
            ->assertStatus(201);
    }

    /**
     * @test
     */
    public function if_fails_validation_return_422()
    {
        $this->actingAs(create('App\User'));
        $post = make('App\Post');
        unset($post['title']);

        $this->postJson('api/posts', $post->toArray())
            ->assertStatus(422);
    }
}
