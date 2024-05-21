<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCKategoriMenu002Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCkategori02
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                    ->assertSee('Category')
                    ->clickLink('Category')
                    ->assertPathIs('/admin/category')
                    ->assertSee('Tambah Kategori')
                    ->clickLink('Tambah Kategori')
                    ->assertPathIs('/admin/category/create')
                    ->type('nama_kategori', 'Snack')
                    ->press('Kirim');
        });
    }
}
