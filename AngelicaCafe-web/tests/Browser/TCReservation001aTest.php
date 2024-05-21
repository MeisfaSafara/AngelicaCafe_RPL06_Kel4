<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCReservation001aTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCReservation001aTest
     */
    public function testReservationForm(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Reservasi') // Assuming 'Reservasi' is the link text for the reservation page
                    ->assertPathIs('/reservations/step-one')
                    ->type('name', 'rama')
                    ->type('email', 'rama@example.com')
                    ->type('tel_number', '123456789')
                    ->type('res_date', '2024-06-15')
                    ->type('start_time', '13:00')
                    ->type('end_time', '14:00')
                    ->type('guest_number', '4')
                    ->press('Next');
        });
    }
}
