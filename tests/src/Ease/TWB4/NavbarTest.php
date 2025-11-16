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

use Ease\TWB4\Navbar;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Navbar.
 */
class NavbarTest extends TestCase
{
    protected Navbar $object;

    protected function setUp(): void
    {
        $this->object = new Navbar('Brand');
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithBrand(): void
    {
        $navbar = new Navbar('MyBrand');
        $this->assertInstanceOf(Navbar::class, $navbar);
    }

    public function testConstructorWithBrandLink(): void
    {
        $navbar = new Navbar('MyBrand', '/');
        $this->assertInstanceOf(Navbar::class, $navbar);
    }

    public function testConstructorWithPosition(): void
    {
        $positions = ['fixed-top', 'fixed-bottom', 'sticky-top'];
        
        foreach ($positions as $position) {
            $navbar = new Navbar('Brand', '/', $position);
            $this->assertInstanceOf(Navbar::class, $navbar);
        }
    }

    public function testConstructorWithType(): void
    {
        $types = ['light', 'dark'];
        
        foreach ($types as $type) {
            $navbar = new Navbar('Brand', '/', null, $type);
            $this->assertInstanceOf(Navbar::class, $navbar);
        }
    }

    public function testConstructorWithProperties(): void
    {
        $properties = ['id' => 'main-navbar'];
        $navbar = new Navbar('Brand', '/', null, null, $properties);
        
        $this->assertEquals('main-navbar', $navbar->getTagProperty('id'));
    }

    public function testExtendsHtmlNavTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\NavTag::class, $this->object);
    }
}