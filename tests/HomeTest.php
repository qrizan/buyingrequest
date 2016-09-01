<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testHome()
    {
        $this->visit('/')
             ->see('Customer Request')
             ->click('Customer Request')
             ->seePageIs('/')

             ->see('Buying Request')
             ->click('Buying Request')
             ->seePageIs('/buyingrequest')

             ->see('Login')
             ->click('Login')
             ->seePageIs('/login');             
    }
}
