<?php
/**
 * Copyright 2010 - 2019, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2018, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace CakeDC\Auth\Test\TestCase\Social\Mapper;

use CakeDC\Auth\Social\Mapper\Twitter;
use Cake\TestSuite\TestCase;

class TwitterTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function testMap()
    {
        $rawData = [
            'uid' => '1',
            'nickname' => 'test',
            'name' => 'Test User',
            'firstName' => null,
            'lastName' => null,
            'email' => null,
            'location' => '',
            'description' => '',
            'imageUrl' => 'http://pbs.twimg.com/profile_images/test.jpeg',
            'urls' => [],
            'extra' => [],
            'token' => [
                'accessToken' => 'test-token',
                'tokenSecret' => 'test-secret'
            ]
        ];
        $providerMapper = new Twitter();
        $user = $providerMapper($rawData);
        $this->assertEquals([
            'id' => '1',
            'username' => 'test',
            'full_name' => 'Test User',
            'first_name' => null,
            'last_name' => null,
            'email' => null,
            'avatar' => 'http://pbs.twimg.com/profile_images/test.jpeg',
            'gender' => null,
            'link' => 'https://twitter.com/test',
            'bio' => '',
            'locale' => null,
            'validated' => false,
            'credentials' => [
                'token' => 'test-token',
                'secret' => 'test-secret',
                'expires' => null
            ],
            'raw' => $rawData
        ], $user);
    }
}
