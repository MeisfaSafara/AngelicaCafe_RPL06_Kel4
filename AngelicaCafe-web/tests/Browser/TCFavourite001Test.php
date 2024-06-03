<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCFavourite001Test.php extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCFavourite01
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Favourite')
                    ->clickLink('Favourite')
                    ->assertPathIs('/fav')

        });
    }
}
