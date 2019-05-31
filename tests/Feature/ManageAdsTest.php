<?php
namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
class ManageAdsTest extends TestCase
{
    use WithFaker, RefreshDatabase;
        /** @test **/
    public function guests_cannot_control_ads()
    {
        // $this->withoutExceptionHandling();
        $ad = factory('App\Ad')->create();
        $this->get('/ads')->assertRedirect('login');
        $this->get('/ads/create')->assertRedirect('login');
        $this->get($ad->path())->assertRedirect('login');
        $this->post('/ads', $ad->toArray())->assertRedirect('login');
    }
    
    /** @test */
    public function a_user_can_create_an_ad()
    {
    	$this->withoutExceptionHandling();
        $this->signIn();
        $this->get('ads/create')->assertStatus(200);
    	$attributes = [
    		'title' => $this->faker->sentence,
    		'phone' => $this->faker->sentence,
    		'description' => $this->faker->paragraph,
    		'price' => $this->faker->randomFloat  
    	];
    	$this->post('/ads', $attributes);
    	$this->assertDatabaseHas('ads', $attributes);
        $this->get('/ads')->assertSee($attributes['title']);
    }
     /** @test **/
    public function a_user_can_view_their_ad()
    {
        $this->be(factory('App\User')->create());
        $this->withoutExceptionHandling();
        $ad = factory('App\Ad')->create(['user_id' => auth()->id()]);
        $this->get($ad->path())
        ->assertSee($ad->title)
        ->assertSee($ad->description);
    }
    /** @test **/
    public function an_auth_user_cant_view_other_ads()
    {
        $this->signIn();
        $ad = factory('App\Ad')->create();
         $this->get($ad->path())->assertStatus(403);
        
    }
    /** @test **/
    public function an_ad_requires_a_title()
    {
        $this->signIn();
        $attributes = factory('App\Ad')->raw(['title' => '']);
        $this->post('/ads', $attributes)->assertSessionHasErrors('title');
    }
     /** @test **/
     public function an_ad_requires_a_description()
    {
        $this->signIn();
        $attributes = factory('App\Ad')->raw(['description' => '']);
        $this->post('/ads', $attributes)->assertSessionHasErrors('description');
    }
    
}