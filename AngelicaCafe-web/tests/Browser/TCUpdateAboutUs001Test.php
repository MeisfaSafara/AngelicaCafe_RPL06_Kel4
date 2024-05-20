<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TCUpdateAboutUs001Test extends DuskTestCase
{
    /**
     * A Dusk test for updating the About Us content.
     * @group TCUpdateAboutUs001Test
     */
    public function testUpdateAboutUsContent(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                    ->clickLink('About Us')
                    ->assertPathIs('/admin/aboutUs/edit')
                    ->assertSee('Edit About Us Content')
                    ->type('content', 'Angelica Cafe bermula dari impian kami untuk menghadirkan cita rasa dan keindahan dalam setiap momen spesial. Kami memulai perjalanan ini dengan tekad kuat untuk menjadi penyedia layanan catering terbaik di Indonesia.
                    Kami mengutamakan kualitas tinggi dalam setiap hidangan dengan menggunakan bahan-bahan segar dan teknik memasak terbaik. Inovasi dalam menu adalah fokus utama kami, yang terus kami kembangkan sesuai dengan tren kuliner dan selera pelanggan.
                    Pelayanan yang prima adalah komitmen kami, yang kami lakukan dengan penuh keramahan, responsif, dan profesional dalam setiap interaksi dengan pelanggan. Kami percaya pada pembangunan kemitraan yang kuat dengan pelanggan, pemasok, dan mitra lainnya untuk menciptakan ekosistem bisnis yang saling menguntungkan.')
                    ->press('Update Content')
                    ->assertPathIs('/admin/aboutUs/edit');
        });
    }
}
