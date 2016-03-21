<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SaeTest extends TestCase
{
    /**
     * Test for env
     *
     * @return void
     */
    public function testEnv()
    {
        $appKey = env('APP_KEY');
        
        assertNotNull($appKey);
    }
}
