<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DataOffloadTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('request/create')
                ->type('name', 'test name')
                ->type('email', 'email@email')
                ->type('phone_number', 'test number')
                ->type('message', "test message")
                ->press('Отправить')
                ->assertSee("Сообщение успешно отправлено.");
        });
    }
}
