<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContentTests extends TestCase
{
    // Rollback and reset database every time you run a test to avoid drafts
    use WithoutMiddleware;
    use DatabaseMigrations;
    use DatabaseTransactions;


    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function testTitleHomePageExists()
    {
        $this->get('/')->assertSee('Welcome to TGScanner!');
    }


}
