<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCUpdateAboutUs002Test extends DuskTestCase
{
    /**
     * A Dusk test for updating the About Us content.
     * @group TCUpdateAboutUs002Test
     */
    public function testUpdateAboutUsContent(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                    ->clickLink('About Us')
                    ->assertPathIs('/admin/aboutUs/edit')
                    ->assertSee('Edit About Us Content')
                    ->type('content', '')
                    ->press('Update Content')
                    ->assertPathIs('/admin/aboutUs/edit');
        });
    }
}
