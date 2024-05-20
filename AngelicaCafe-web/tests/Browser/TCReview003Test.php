<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCReview003Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCreview03
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                    ->assertSee('Review')
                    ->clickLink('Review')
                    ->assertPathIs('/admin/review')
                    ->assertSee('Makanannya Enak');
        });
    }
}
