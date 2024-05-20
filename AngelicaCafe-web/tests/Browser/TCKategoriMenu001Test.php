<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCKategoriMenu001Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCkategori01
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Menu')
                    ->clickLink('Menu')
                    ->assertPathIs('/menu')
                    ->assertSee('Minuman')
                    ->clickLink('Minuman')
                    ->assertPathIs('/menu/2');
        });
    }
}
