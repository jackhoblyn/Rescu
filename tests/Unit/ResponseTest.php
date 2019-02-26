<?php

namespace Tests\Unit;

use App\Response;
use App\Ad;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;;

class ResponseTest extends TestCase
{
    
    use RefreshDatabase;

    /** @test **/
    function it_belongs_to_an_ad()
    {		
		$response = factory(Response::class)->create();
		$this->assertInstanceOf(Ad::class, $response->ad);

    }

    /** @test **/
    function it_has_a_path()
    {		
    		$response = factory(Response::class)->create();
    		$this->assertEquals('/ads/' . $response->ad->id . '/responses/' .$response->id, $response->path());

    }	

}
