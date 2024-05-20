<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCKategoriMenu003Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCkategori03
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                    ->assertSee('Category')
                    ->clickLink('Category')
                    ->assertPathIs('/admin/category')
                    ->with('table tbody tr:nth-child(3)', function ($tr) {
                        $tr->assertSee('Snack')
                           ->clickLink('Edit');
                    })
                    ->assertPathIs('/admin/category/update/8')
                    ->assertSee('Nama Kategori')
                    ->type('nama_kategori', 'Snack Box')
                    ->press('Kirim');
                    
        });
    }
}
