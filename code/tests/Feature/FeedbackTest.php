<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFeedback(): void
    {
        $response = $this->get('/feedback');

        $response->assertSeeText('Feedback');
        $response->assertStatus(200);
    }

    public function testFeedbackCreate(): void
    {
        $response = $this->get('/feedback/create');

        $response->assertStatus(302);
    }
}
