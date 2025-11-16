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

use Ease\TWB4\Checkbox;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Checkbox.
 */
class CheckboxTest extends TestCase
{
    protected Checkbox $object;

    protected function setUp(): void
    {
        $this->object = new Checkbox('agree');
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithName(): void
    {
        $checkbox = new Checkbox('terms');
        $this->assertInstanceOf(Checkbox::class, $checkbox);
    }

    public function testConstructorWithChecked(): void
    {
        $checkbox = new Checkbox('agree', true);
        $this->assertInstanceOf(Checkbox::class, $checkbox);
    }

    public function testConstructorWithValue(): void
    {
        $checkbox = new Checkbox('agree', false, 'yes');
        $this->assertInstanceOf(Checkbox::class, $checkbox);
    }

    public function testConstructorWithProperties(): void
    {
        $properties = ['id' => 'checkbox-1', 'data-value' => 'test'];
        $checkbox = new Checkbox('test', false, 'value', $properties);
        
        $this->assertEquals('checkbox-1', $checkbox->getTagProperty('id'));
        $this->assertEquals('test', $checkbox->getTagProperty('data-value'));
    }

    public function testExtendsHtmlInputTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\InputTag::class, $this->object);
    }
}