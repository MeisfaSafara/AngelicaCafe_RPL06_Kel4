<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCProfile0021Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCProfile0021
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'user@gmail.com')
                    ->type('password', 'user@gmail.com') 
                    ->press('Login') 
                    ->assertPathIs('/profile')
                    ->type('first_name', 'Mutiara2')
                    ->type('last_name', 'Viena2')
                    ->type('email', 'user2@gmail.com')
                    ->type('phone', '1234567890')
                    ->type('password', 'newpassword')
                    ->type('confirm_password', '')
                    ->press('Update Information')
                    ;
        });
    }
}
