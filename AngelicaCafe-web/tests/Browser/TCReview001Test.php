<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCReview001Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCreview01
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'bangmesii@gmail.com')
                    ->type('password', '123') 
                    ->press('Login')
                    ->assertPathIs('/profile')
                    ->assertSee('Transaction List')
                    ->clickLink('Transaction List')
                    ->assertSee('Review')
                    ->clickLink('Review')
                    ->assertPathIs('/profile/profile/transaction/review/5')
                    ->press('Save')
                    ->assertSee('Terjadi kesalahan validasi!');
        });
    }
}
