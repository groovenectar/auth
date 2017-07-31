<?php
/**
 * Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace CakeDC\Auth\Auth\Test\TestCase\Auth;

use CakeDC\Auth\Auth\SimpleRbacAuthorize;
use Cake\Controller\ComponentRegistry;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\TestSuite\TestCase;
use Cake\Utility\Hash;
use ReflectionClass;

class SimpleRbacAuthorizeTest extends TestCase
{

    /**
     * @var SimpleRbacAuthorize
     */
    protected $simpleRbacAuthorize;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $request = new ServerRequest();
        $response = new Response();

        $this->controller = $this->getMockBuilder('Cake\Controller\Controller')
            ->setMethods(null)
            ->setConstructorArgs([$request, $response])
            ->getMock();
        $this->registry = new ComponentRegistry($this->controller);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->simpleRbacAuthorize, $this->controller);
    }

    /**
     * @covers \CakeDC\Auth\Auth\SimpleRbacAuthorize::__construct
     */
    public function testConstruct()
    {
        //don't autoload config
        $this->simpleRbacAuthorize = new SimpleRbacAuthorize($this->registry, ['autoload_config' => false]);
        $this->assertEmpty($this->simpleRbacAuthorize->getConfig('permissions'));
    }

    /**
     * @test
     */
    public function testAuthorize()
    {
        $user = [
            'id' => 1,
            'role' => 'test',
        ];


    }
}
