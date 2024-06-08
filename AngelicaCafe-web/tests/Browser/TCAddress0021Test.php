<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCAddress0021Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCAddress0021Test
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
            ->type('email', 'user@gmail.com')
            ->type('password', 'user@gmail.com')
            ->press('Login')
            ->assertPathIs('/profile')
            ->assertSee('Address List')
            ->clickLink('Address List')
            ->assertPathIs('/profile/address')
            ->assertSee('Canada')
            ->press('Delete')
            ;
        });
    }
}
