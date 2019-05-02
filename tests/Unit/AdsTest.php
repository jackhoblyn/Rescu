<?php

namespace Tests\Unit;

use App\Ad;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdsTest extends TestCase
{
    /** @test **/
	 function test_an_ad_can_be_chosen()

	 {
	 	$ad = factory(Ad::class)->create();

	 	$this->assertEquals('no', $ad->chosen);

	 	$ad->chosen();

	 	$this->assertEquals('yes', $ad->chosen);
	 }


	 /** @test **/
	 function it_can_be_left_as_not_chosen()

	 {
	 	$ad = factory(Ad::class)->create(['chosen' => 'yes']);

	 	$this->assertEquals('yes', $ad->chosen);

	 	$ad->open();

	 	$this->assertEquals('no', $ad->chosen);
	 }
}
