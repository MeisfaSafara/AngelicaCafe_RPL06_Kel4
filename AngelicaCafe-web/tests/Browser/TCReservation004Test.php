<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCReservation004Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCReservation04Test
     */
    public function testReservationFormWithInvalidInputs(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
            ->assertSee('Reservasi')
            ->clickLink('Reservasi')
            ->assertPathIs('/admin/reservations')
            ->with('table tbody tr:nth-child(1)', function ($tr) {
                $tr->assertSee('rama akhir')
                   ->clickLink('Edit');
            })
            ->assertPathIs('/admin/admin/reservations/18/edit')
            ->assertSee('Status')
            ->select('status', '')
            ->press('Save Changes')
            ->assertSee('The status field is required.')
                
                ;
        });
    }
}
