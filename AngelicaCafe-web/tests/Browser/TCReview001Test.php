<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCReview001Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCreview01
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/review')
                    ->assertSee('Add Review')
                    ->type('review', 'Makanannya Enak Bgt')
                    ->press('Save');
        });
    }
}
