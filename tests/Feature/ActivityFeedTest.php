<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\Ad;
use App\Response;
use App\Repair;
use App\Vendor;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivityFeedTest extends TestCase
{

	 /** @test **/
	 function creating_an_ad()
	 {
	 	$ad = factory(Ad::class)->create();

	 	$this->assertCount(1, $ad->activity);
	 	$this->assertEquals('created ad', $ad->activity[0]->description);
	 }

	 // /** @test **/
	 // function updating_an_ad_generates_activity()
	 // {
	 // 	$ad = factory(Ad::class)->create();

	 // 	$ad->update(['title' => 'changed']);
	 // 	$this->assertCount(2, $ad->activity);
	 // 	$this->assertEquals('updated ad', $ad->activity->last()->description);
	 // }

	 /** @test **/
	 function reopening_an_ad()
	 {
	 	$this->withoutExceptionHandling();

	 	$ad = factory(Ad::class)->create();

	 	$ad->update(['chosen' => 'yes']);

	 	$ad->open();

	 	$this->assertCount(2, $ad->activity);
	 	$this->assertEquals('ad reopened', $ad->activity->last()->description);
	 }

	 	 /** @test **/
	 function creating_new_response()
	 {
	 	$ad = factory(Ad::class)->create();
	 	$vendor = factory(Vendor::class)->create();


 	
	 	$ad->addResponse($vendor->id, 'some response', 99);

	 	$this->assertCount(2, $ad->activity);

	 	tap($ad->activity->last(), function ($activity) {

	 		// dd($activity->toArray());

	 		$this->assertEquals('response posted', $activity->description);
	 		//$this->assertInstanceOf(Response::class, $activity->subject);
	 	});
 		
	 		
	 }

	 // function creating_new_response()
	 // {
	 // 	$ad = factory(Ad::class)->create();
	 // 	$vendor = factory(Vendor::class)->create();
 	
	 // 	$ad->addResponse($vendor->id, 'some response', 99);

	 // 	$this->assertCount(2, $ad->activity);

	 // 	tap($ad->activity->last(), function ($activity) {

	 // 		dd($activity->toArray());

	 // 		$this->assertEquals('response posted', $activity->description);
	 // 		$this->assertInstanceOf(Response::class, $activity->subject);

	 // 	});
	 // }
	 

	 /** @test **/
	 function choosing_response()
	 
	 {
	 	$this->withoutExceptionHandling();
 	
	 	$response = factory(Response::class)->create();
	 	$response->ad->chosen();

	 	$this->assertCount(3, $response->ad->activity);
	 	$this->assertEquals('response picked', $response->ad->activity->last()->description);
	 }

	 /** @test **/
	 function creating_new_repair()

	 {
	 	$this->withoutExceptionHandling();
 	
	 	$repair = factory(Repair::class)->create();

	 	$this->assertCount(2, $repair->ad->activity);
	 	$this->assertEquals('repair started', $repair->ad->activity->last()->description);
	 }
    
    
}
