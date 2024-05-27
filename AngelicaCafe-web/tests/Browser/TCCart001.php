<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCCart001 extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TCCart001
     */
   
    public function user_can_add_item_to_cart(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cart')
                    ->assertSee('Your Cart')
                    ->press('+') 
                    ->pause(1000) 
                    ->press('Checkout')
                    ->assertPathIs('/checkout')
                    ->assertSee('Order Summary');
        });
    }

    public function user_can_remove_item_from_cart(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cart')
                    ->assertSee('Your Cart')
                    ->press('close') 
                    ->pause(1000) 
                    ->assertDontSee('Item Name') 
                    ->assertSee('Order Summary');
        });
    }

    public function user_can_update_quantity_in_cart(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cart')
                    ->assertSee('Your Cart')
                    ->press('+') 
                    ->pause(1000) 
                    ->press('-') 
                    ->pause(1000)
                    ->assertSee('Order Summary');
        });
    }

    public function user_can_checkout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cart')
                    ->assertSee('Your Cart')
                    ->press('Checkout')
                    ->assertPathIs('/checkout')
                    ->assertSee('Order Summary');
        });
    }
}

