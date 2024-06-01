<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCDashboard001Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCdashboard01
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                    ->assertSee('Total Sales Today')
                    ->assertSee('Total Orders Today');
        });
    }
}
