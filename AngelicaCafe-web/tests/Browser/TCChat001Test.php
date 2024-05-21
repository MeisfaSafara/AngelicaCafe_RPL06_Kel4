<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCChat001Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCChat001Test
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'user@gmail.com')
                    ->type('password', 'user@gmail.com') 
                    ->press('Login') 
                    ->assertPathIs('/profile')
                    ->clickLink('About Us')
                    ->assertPathIs('/about')
                    ->press('Hubungi Kami')
                    ->press('Mulai Chat')
        ;});
    }
}
