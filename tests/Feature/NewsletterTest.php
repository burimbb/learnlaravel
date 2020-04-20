<?php

namespace Tests\Feature;

use App\Newsletter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Mockery;
use Tests\TestCase;

class NewsletterTest extends TestCase
{
    /**
     * @test
     */
    public function test()
    {
        $user = factory('App\User')->create();
        $this->actingAs($user);

        /* $mock = Mockery::mock(Newsletter::class, function($mock) use ($user){
            // $mock->shouldReceive('subscribeTo')->with('members', $user)->once();
            $mock->shouldReceive()->subscribeTo('members', $user)->once();
        });

        app()->instance(Newsletter::class, $mock); */

        $this->mock(Newsletter::class, function($mock) use ($user){
            $mock->shouldReceive()->subscribeTo('members', $user)->once();
        });

        $this->get('/newsletter');
    }

    /**
     * @test
     */
    public function spymethod()
    {
        $user = factory('App\User')->create();
        $this->actingAs($user);

        $spy = $this->spy(Newsletter::class);
        
        $this->get('/newsletter');

        $spy->shouldHaveReceived()->subscribeTo('members', $user)->once();
    }
}
