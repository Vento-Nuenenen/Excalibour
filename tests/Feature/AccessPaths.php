<?php

namespace Tests\Feature;

use Tests\TestCase;

class AccessPaths extends TestCase
{
    public function accessTest()
    {
        $responseRoot = $this->get('/');
	    $responseRoot->assertStatus(302);

	    $responseLogin = $this->get('/login');
	    $responseLogin->assertStatus(200);
    }
}
