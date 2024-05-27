<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCKategoriMenu003Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCProduk003
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                    ->assertSee('Products')
                    ->clickLink('Products')
                    ->assertPathIs('/admin/Products')
                    ->assertSee('Tambah Produk')
                    ->clickLink('Tambah Produk')
                    ->assertPathIs('/admin/produks/create')
                    
        });
                    
        
    }
}