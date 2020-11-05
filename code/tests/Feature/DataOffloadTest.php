<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DataOffloadTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     public function testDataOffload(): void
     {
        $response = $this->get('/request');

        $response->assertSeeText('Request');
        $response->assertStatus(200);
     }
 
     public function testDataOffloadCreate(): void
     {
         $response = $this->get('/request/create');
 
         $response->assertStatus(302);
     }
}
