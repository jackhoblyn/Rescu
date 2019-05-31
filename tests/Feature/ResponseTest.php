<?php
namespace Tests\Feature;
use App\Ad;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
class ResponseTest extends TestCase
{
	use RefreshDatabase;
    
    /** @test */
    public function an_ad_can_have_responses()
    {
    	$this->withoutExceptionHandling();
    	$this->vendorSignIn();
    	$ad = factory(Ad::class)->create();
    	$this->post($ad->list() .'/responses', ['description' =>  'Test Response']);
    	$this->get($ad->list())
    	 ->assertSee('Test Response'); 
    }
    /** @test */
    public function a_response_can_be_updated()
    {
        $this->SignIn();
        $this->withoutExceptionHandling();
        $ad = auth()->user()->ads()->create(factory(Ad::class)->raw());
        $response = $ad->addResponse('Test Response');
        $this->patch($ad->list() . '/responses/' . $response->id, [
            'description' => 'changed', 
            'chosen' => true
        ]);
        $this->assertDatabaseHas('responses', [
            'description' => 'changed',
            'chosen' => true
        ]);
    }
    
}