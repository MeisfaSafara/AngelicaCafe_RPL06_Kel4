<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCReview002Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCreview02
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/review')
                    ->assertSee('Makanannya Enak');
        });
    }
}
