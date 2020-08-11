<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AppTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

    /**
     * @test that 5000 users are created.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $this->post('/users');

    //     $this->assertC(
    //         $this->app->version(), $this->response->getContent()
    //     );
    // }
}
