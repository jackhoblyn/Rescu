<?php


use Illuminate\Support\Facades\Auth;
namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function vendorSignIn($user = null)
    {
    	$user = Auth('vendor')->user();
    	return $this->actingAs($user ?: factory('App\Vendor')->create());
    }

     protected function signIn($user = null)
    {
    	return $this->actingAs($user ?: factory('App\User')->create());
    }
}

