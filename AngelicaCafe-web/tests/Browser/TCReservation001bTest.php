<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCReservation001bTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCReservation001bTest
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/reservations/step-two')
                    ->assertPathIs('/reservations/step-two')
                    ->select('location', 'Cabang Jakarta Pusat')
                    ->select('venue', 'Indoor')
                    ->select('order', 'Paket 1')
                    ->type('additional_order', 'No additional orders')
                    ->press('Make Reservation');
        });
    }
}
