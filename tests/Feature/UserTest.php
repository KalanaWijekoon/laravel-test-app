<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_user_route()
    {
        $response = $this->get('user/create');

        $response->assertStatus(200);
    }

    public function test_store_new_user_email_validation()
    {
        $response = $this->post('user/',[
            'firstName'=>'kalana',
            'lastName' => 'wijekoon',
            'email'=>'not and email',
            'country'=>'Scotland',
            'rate'=>450.25,
            'currencyUnit'=>'GBP'
        ]);

        $response->assertStatus(302);
    }

    public function test_store_new_user_rate_validation()
    {
        $response = $this->post('user/',[
            'firstName'=>'kalana',
            'lastName' => 'wijekoon',
            'email'=>'not and email',
            'country'=>'Scotland',
            'rate'=>'not a number',
            'currencyUnit'=>'GBP'
        ]);

        $response->assertStatus(302);
    }

}
