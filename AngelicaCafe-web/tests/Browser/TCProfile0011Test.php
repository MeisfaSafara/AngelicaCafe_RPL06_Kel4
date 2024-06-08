<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCProfile0011Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCProfile0011
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'user@gmail.com')
                    ->type('password', 'user@gmail.com') 
                    ->press('Login') 
                    ->assertPathIs('/profile')
                    ->type('first_name', 'Mutiara')
                    ->type('last_name', 'Viena')
                    ->type('email', 'user1@gmail.com')
                    ->type('phone', '1234567890')
                    ->press('Update Information')
                    ;
        });
    }
}
