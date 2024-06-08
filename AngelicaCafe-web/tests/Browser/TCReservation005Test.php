<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCReservation005Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCReservation05Test
     */
    public function testReservationFormWithInvalidInputs(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'user@gmail.com')
                    ->type('password', 'user@gmail.com') 
                    ->press('Login') 
                    ->assertPathIs('/profile')
                    ->assertSee('Reservation List')
                    ->clickLink('Reservation List')
                    ->assertPathIs('/profile/reservation')

                    ; 
        });
    }
}
