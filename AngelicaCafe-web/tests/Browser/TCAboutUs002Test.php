<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCAboutUs002Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCAboutUs002
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('About Us')
                    ->assertPathIs('/reservation');
        });
    }
}
