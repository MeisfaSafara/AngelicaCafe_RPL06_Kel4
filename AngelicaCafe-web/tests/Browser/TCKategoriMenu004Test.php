<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCKategoriMenu004Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCkategori04
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                    ->assertSee('Category')
                    ->clickLink('Category')
                    ->assertPathIs('/admin/category')
                    ->with('table tbody tr:nth-child(3)', function ($tr) {
                        $tr->assertSee('Snack Box')
                        ->within('.flex', function ($deleteButton) {
                                $deleteButton->press('Delete');
                            });
                    })
                    ->assertPathIs('/admin/category')
                    ->assertDontSee('Snack');

        });
    }
}