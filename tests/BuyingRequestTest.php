<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BuyingRequestTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBuyingRequest()
    {
        $pathToFile = '/image';
        $this->visit('/buyingrequest')
             ->type('Lorem ipsum bla bli blu ble blo','deskripsi')
             ->attach($pathToFile, 'image')
             ->type('qrizan@gmail.com','email')
             ->type('6969696969696','phone')
             ->type('2016-10-10','expired')
             ->type('2016-11-11','deadline')             
             ->check('agree')
             ->press('Save');
    }
}
