<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserApiTests extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_show()
    {
        $this->withoutExceptionHandling();

        $response = $this->getJson('/api/users/1');

        $response->assertEquals(1, count($response));
    }
}
