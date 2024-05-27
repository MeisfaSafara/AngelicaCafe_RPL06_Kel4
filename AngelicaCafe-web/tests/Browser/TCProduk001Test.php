<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCKategoriMenu002Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCProduk001
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->assertSee('Menu')
                    ->clickLink('Menu')
                    ->assertPathIs('/menu')
                    
        });
    }
}
