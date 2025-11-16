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

use Ease\TWB4\Tabs;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Tabs.
 */
class TabsTest extends TestCase
{
    protected Tabs $object;

    protected function setUp(): void
    {
        $this->object = new Tabs('test-tabs');
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithId(): void
    {
        $tabs = new Tabs('my-tabs');
        $this->assertInstanceOf(Tabs::class, $tabs);
    }

    public function testConstructorWithProperties(): void
    {
        $properties = ['class' => 'custom-tabs'];
        $tabs = new Tabs('tabs-1', $properties);
        
        $this->assertInstanceOf(Tabs::class, $tabs);
    }

    public function testAddTabMethod(): void
    {
        $tabs = new Tabs('test-tabs');
        $content = new \Ease\Html\DivTag('Tab content');
        $tabs->addTab('Tab 1', $content);
        
        $this->assertInstanceOf(Tabs::class, $tabs);
    }

    public function testAddMultipleTabs(): void
    {
        $tabs = new Tabs('multi-tabs');
        $tabs->addTab('First', new \Ease\Html\DivTag('First content'));
        $tabs->addTab('Second', new \Ease\Html\DivTag('Second content'));
        $tabs->addTab('Third', new \Ease\Html\DivTag('Third content'));
        
        $this->assertInstanceOf(Tabs::class, $tabs);
    }

    public function testExtendsHtmlDivTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $this->object);
    }
}