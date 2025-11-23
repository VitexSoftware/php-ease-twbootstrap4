<?php

declare(strict_types=1);

/**
 * This file is part of the EaseTWBootstrap4 package
 *
 * https://github.com/VitexSoftware/php-ease-twbootstrap4
 *
 * (c) Vítězslav Dvořák <http://vitexsoftware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Test\Ease\TWB4;

use Ease\TWB4\Container;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Container.
 */
class ContainerTest extends TestCase
{
    protected Container $object;

    protected function setUp(): void
    {
        $this->object = new Container();
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithNoParameters(): void
    {
        $container = new Container();
        $this->assertInstanceOf(Container::class, $container);
        $this->assertStringContainsString('container', $container->getTagProperty('class'));
    }

    public function testConstructorWithContent(): void
    {
        $content = 'Container content';
        $container = new Container($content);
        $this->assertStringContainsString('container', $container->getTagProperty('class'));
    }

    public function testConstructorWithProperties(): void
    {
        $properties = ['id' => 'main-container', 'data-spy' => 'scroll'];
        $container = new Container(null, $properties);
        
        $this->assertStringContainsString('container', $container->getTagProperty('class'));
        $this->assertEquals('main-container', $container->getTagProperty('id'));
        $this->assertEquals('scroll', $container->getTagProperty('data-spy'));
    }

    public function testExtendsHtmlDivTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $this->object);
    }
}