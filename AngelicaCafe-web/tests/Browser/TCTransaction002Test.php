<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCTransaction002Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCTransaction002Test
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'user@gmail.com')
                    ->type('password', 'user@gmail.com')
                    ->press('Login')
                    ->assertPathIs('/profile')
                    ->assertSee('Transaction List')
                    ->clickLink('Transaction List')
                    ->assertPathIs('/profile/transaction')
                    ->assertSee('12')
                    ->clickLink('Lihat Detail')
                    ->assertPathIs('/profile/transaction/detail/12')
                    ;
        });
    }
}
