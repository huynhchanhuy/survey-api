<?php

// abstract class TestCase extends Laravel\Lumen\Testing\TestCase
// {
//     *
//      * Creates the application.
//      *
//      * @return \Laravel\Lumen\Application
     
//     public function createApplication()
//     {
//         return require __DIR__.'/../bootstrap/app.php';
//     }
// }

use Lukasoppermann\Httpstatus\Httpstatuscodes;
use Lukasoppermann\Testing\TestTrait;

class TestCase extends \Laravel\Lumen\Testing\TestCase implements Httpstatuscodes 
{
	use TestTrait;
    
    protected $client;

    public function setUp()
    {
        parent::setUp();

        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'http://api.mylumenapi.app',
            'exceptions' => false,
        ]);
    }
}