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

use Ease\TWB4\DropdownLink;
use PHPUnit\Framework\TestCase;

/**
 * Test class for DropdownLink.
 */
class DropdownLinkTest extends TestCase
{
    protected DropdownLink $object;

    protected function setUp(): void
    {
        $this->object = new DropdownLink('Dropdown');
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithLabel(): void
    {
        $dropdown = new DropdownLink('Menu');
        $this->assertInstanceOf(DropdownLink::class, $dropdown);
    }

    public function testConstructorWithIcon(): void
    {
        $dropdown = new DropdownLink('Settings', 'gear');
        $this->assertInstanceOf(DropdownLink::class, $dropdown);
    }

    public function testConstructorWithProperties(): void
    {
        $properties = ['id' => 'user-menu', 'class' => 'nav-link'];
        $dropdown = new DropdownLink('User', null, $properties);
        
        $this->assertEquals('user-menu', $dropdown->getTagProperty('id'));
    }

    public function testExtendsHtmlATag(): void
    {
        $this->assertInstanceOf(\Ease\Html\ATag::class, $this->object);
    }
}