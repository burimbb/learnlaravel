<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{

    /**
    * A basic browser test example.
    *
    * @return void
    */
    public function testLogin()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }
}
