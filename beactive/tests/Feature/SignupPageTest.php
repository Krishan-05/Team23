<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SignupPageTest extends TestCase
{

    public function test_signup_page_loads()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }
}