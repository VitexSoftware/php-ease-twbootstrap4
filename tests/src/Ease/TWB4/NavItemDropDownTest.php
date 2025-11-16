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

use Ease\TWB4\NavItemDropDown;
use PHPUnit\Framework\TestCase;

/**
 * Test class for NavItemDropDown.
 */
class NavItemDropDownTest extends TestCase
{
    protected NavItemDropDown $object;

    protected function setUp(): void
    {
        $this->object = new NavItemDropDown('Menu');
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithLabel(): void
    {
        $navItem = new NavItemDropDown('Dropdown');
        $this->assertInstanceOf(NavItemDropDown::class, $navItem);
    }

    public function testConstructorWithItems(): void
    {
        $items = [
            'Action' => '/action',
            'Another action' => '/another',
        ];
        $navItem = new NavItemDropDown('Menu', $items);
        
        $this->assertInstanceOf(NavItemDropDown::class, $navItem);
    }

    public function testConstructorWithIcon(): void
    {
        $navItem = new NavItemDropDown('Settings', [], 'cog');
        $this->assertInstanceOf(NavItemDropDown::class, $navItem);
    }

    public function testConstructorWithProperties(): void
    {
        $properties = ['id' => 'user-dropdown'];
        $navItem = new NavItemDropDown('User', [], null, $properties);
        
        $this->assertEquals('user-dropdown', $navItem->getTagProperty('id'));
    }

    public function testExtendsHtmlLiTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\LiTag::class, $this->object);
    }
}