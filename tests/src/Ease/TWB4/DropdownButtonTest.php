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

use Ease\TWB4\DropdownButton;
use PHPUnit\Framework\TestCase;

/**
 * Test class for DropdownButton.
 */
class DropdownButtonTest extends TestCase
{
    protected DropdownButton $object;

    protected function setUp(): void
    {
        $this->object = new DropdownButton('Dropdown');
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithLabel(): void
    {
        $dropdown = new DropdownButton('Actions');
        $this->assertInstanceOf(DropdownButton::class, $dropdown);
    }

    public function testConstructorWithType(): void
    {
        $types = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
        
        foreach ($types as $type) {
            $dropdown = new DropdownButton('Menu', $type);
            $this->assertInstanceOf(DropdownButton::class, $dropdown);
        }
    }

    public function testConstructorWithProperties(): void
    {
        $properties = ['id' => 'main-dropdown', 'data-toggle' => 'dropdown'];
        $dropdown = new DropdownButton('Menu', 'primary', $properties);
        
        $this->assertEquals('main-dropdown', $dropdown->getTagProperty('id'));
    }

    public function testExtendsHtmlDivTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $this->object);
    }
}