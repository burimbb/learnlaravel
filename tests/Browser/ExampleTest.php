<?php

namespace Tests\Browser;

use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                    ->assertSee('Login');
        });
    }

    /**
     * @test
     */
    public function testInputPage()
    {
        $this->browse(function(Browser $browser){
            $browser->visit('/page')
                ->type('name', 'FOOBAR')
                ->press('Button')
                ->assertSee('You typed FOOBAR');
        });
    }

}
