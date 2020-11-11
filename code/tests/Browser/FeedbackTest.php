<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FeedbackTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('feedback/create')
                ->type('name', 'test name')
                ->type('message', "test message")
                ->screenshot('feedbacktest')
                ->press('Отправить')
                ->assertPathIs('/feedback/store');
        });
    }
}
