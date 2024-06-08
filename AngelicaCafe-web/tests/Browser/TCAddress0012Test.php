<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCAddress0012Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCAddress0012Test
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
                    ->assertSee('Add New Address')
                    ->clickLink('Add New Address')
                    ->assertPathIs('/profile/address/add')
                    ->type('street', '')
                    ->type('city', 'Metropolis')
                    ->type('state', 'Canada')
                    ->type('postal_code', '12345')
                    ->press('Save')
                    ->assertPathIs('/profile/address');
        });
    }
}
