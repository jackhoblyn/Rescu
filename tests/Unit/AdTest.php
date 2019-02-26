<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdTest extends TestCase
{
	use RefreshDatabase;

     /** @test **/
    public function it_has_a_path()
    {
        $ad = factory('App\Ad')->create();

        $this->assertEquals('/ads/' . $ad->id, $ad->path());;
    }

    /** @test **/
    public function it_belongs_to_an_owner()
    {
        $ad = factory('App\Ad')->create();

        $this->assertInstanceOf('App\User', $ad->user);
    }

    /** @test */
    public function it_can_add_responses()
    {
        $ad = factory('App\Ad')->create();
       // $response = factory('App\Response')->create();
        $response = $ad->addResponse('Test Response');

        $this->assertCount(1, $ad->responses);
        $this->assertTrue($ad->responses->contains($response));

    }

}
