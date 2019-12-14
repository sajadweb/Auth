<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use \Illuminate\Support\Facades\Log;

class AuthTest extends TestCase
{
    /**
     *  NotAcceptable 406
     *
     * @return void
     */
    public function testGiveClintId()
    {

        $this->get('/auth');
        Log::info($this->response->status());
        $this->assertEquals(406, $this->response->status());
    }

    /**
     *  Unauthorized401 401
     *
     * @return void
     */
    public function testCreated201()
    {

        $this->get('/auth', [
                "client-key" => "12345678-1234-1234-1234-4f7a75aa80f8",
                "app-name" => "Bundle",
                "app-ver" => "1.1",
                "app-type" => "web"
        ]);
        Log::info($this->response->status());
        $this->assertEquals(201, $this->response->status());
    }
}
