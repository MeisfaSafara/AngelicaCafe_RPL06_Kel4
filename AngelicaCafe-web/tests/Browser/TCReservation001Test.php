<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCReservation001Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'user@gmail.com')
                    ->type('password', 'user@gmail.com') 
                    ->press('Login') 
                    ->assertPathIs('/profile')
                    ->clickLink('Reservasi')
                    ->assertPathIs('/reservations/stepone')
        ;
        });
    }
}
