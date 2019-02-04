<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_an_ad()
    {

    	$this->withoutExceptionHandling();

    	$attributes = [

    		'title' => $this->faker->sentence,
    		'phone' => $this->faker->sentence,
    		'description' => $this->faker->paragraph,
    		'price' => $this->faker->randomFloat  
    	];

    	$this->post('/ads', $attributes)->assertRedirect('/ads');

    	$this->assertDatabaseHas('ads', $attributes);

        $this->get('/ads')->assertSee($attributes['title']);

    }

     /** @test **/
    public function a_user_can_view_an_ad()
    {
        $this->withoutExceptionHandling();
        $ad = factory('App\Ad')->create();

        $this->get($ad->path())
        ->assertSee($ad->title)
        ->assertSee($ad->phone)
        ->assertSee($ad->price);
    }

    /** @test **/
    public function an_ad_requires_a_title()
    {

        $attributes = factory('App\Ad')->raw(['title' => '']);

        $this->post('/ads', $attributes)->assertSessionHasErrors('title');
    }

     /** @test **/
     public function an_ad_requires_a_description()
    {
        $attributes = factory('App\Ad')->raw(['description' => '']);

        $this->post('/ads', $attributes)->assertSessionHasErrors('description');
    }

    /** @test **/
    public function an_ad_requires_an owner()
    {
        $attributes = factory('App\Ad')->raw(;

        $this->post('/ads', $attributes)->assertSessionHasErrors('owner');
    }


}
