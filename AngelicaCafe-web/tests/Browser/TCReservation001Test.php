<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCReservation001Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCReservation001Test
     */
    public function testReservationForm(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'user@gmail.com')
                ->type('password', 'user@gmail.com')
                ->press('Login')
                ->assertPathIs('/profile')
                ->clickLink('Reservasi') 
                ->assertPathIs('/reservations/step-one')
                ->type('name', 'rama coba')
                ->type('email', 'rama@example.com')
                ->type('tel_number', '123456789')
                ->type('res_date', '10/21/2024')
                ->type('start_time', '13:00')
                ->type('end_time', '14:00')
                ->type('guest_number', '4')
                ->press('Next')
                ->visit('/reservations/step-two')
                ->assertPathIs('/reservations/step-two')
                ->select('location', 'Cabang Jakarta Pusat')
                ->select('venue', 'Indoor')
                ->select('order', 'Paket 1')
                ->type('additional_order', 'No additional orders')
                ->press('Make Reservation')
                ;
        });
        
        
    }
    
}
