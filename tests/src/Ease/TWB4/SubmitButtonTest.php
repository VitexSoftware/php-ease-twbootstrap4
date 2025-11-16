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

use Ease\TWB4\SubmitButton;
use PHPUnit\Framework\TestCase;

/**
 * Test class for SubmitButton.
 */
class SubmitButtonTest extends TestCase
{
    protected SubmitButton $object;

    protected function setUp(): void
    {
        $this->object = new SubmitButton('Submit');
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithValue(): void
    {
        $button = new SubmitButton('Submit');
        $this->assertInstanceOf(SubmitButton::class, $button);
        $this->assertStringContainsString('btn', $button->getTagProperty('class'));
    }

    public function testConstructorWithNoType(): void
    {
        $button = new SubmitButton('Submit');
        $class = $button->getTagProperty('class');
        $this->assertEquals('btn', $class);
    }

    public function testConstructorWithDifferentTypes(): void
    {
        $types = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
        
        foreach ($types as $type) {
            $button = new SubmitButton('Submit', $type);
            $class = $button->getTagProperty('class');
            $this->assertStringContainsString('btn', $class);
            $this->assertStringContainsString("btn-{$type}", $class);
        }
    }

    public function testConstructorWithProperties(): void
    {
        $properties = ['id' => 'submit-btn', 'disabled' => 'disabled'];
        $button = new SubmitButton('Submit', 'primary', $properties);
        
        $this->assertEquals('submit-btn', $button->getTagProperty('id'));
        $this->assertEquals('disabled', $button->getTagProperty('disabled'));
    }

    public function testExtendsHtmlButtonTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\ButtonTag::class, $this->object);
    }
}