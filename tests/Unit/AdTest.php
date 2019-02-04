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
}
