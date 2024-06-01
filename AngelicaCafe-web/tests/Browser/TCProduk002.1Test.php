<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCProduk002Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCProduk002.1
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
                    ->type('nama_produk', 'Kerupuk')
                    ->type('deskripsi', 'Aci Goreng')
                    ->type('stok', '10')
                    ->type('harga', '3000')
                    ->type('gambar', '')
                    ->type('kategori', 'makanan')
                    ->press('Kirim');
        });
                    
        
    }
}
