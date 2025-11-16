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

use Ease\TWB4\LinkButton;
use PHPUnit\Framework\TestCase;

/**
 * Test class for LinkButton.
 */
class LinkButtonTest extends TestCase
{
    protected LinkButton $object;

    protected function setUp(): void
    {
        $this->object = new LinkButton('#', 'Click me');
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithBasicParameters(): void
    {
        $button = new LinkButton('#', 'Click me');
        $this->assertInstanceOf(LinkButton::class, $button);
        $this->assertStringContainsString('btn', $button->getTagProperty('class'));
    }

    public function testConstructorWithNoType(): void
    {
        $button = new LinkButton('#', 'Button');
        $class = $button->getTagProperty('class');
        $this->assertStringContainsString('btn', $class);
        $this->assertStringContainsString('btn-default', $class);
    }

    public function testConstructorWithDifferentTypes(): void
    {
        $types = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
        
        foreach ($types as $type) {
            $button = new LinkButton('#', 'Button', $type);
            $class = $button->getTagProperty('class');
            $this->assertStringContainsString('btn', $class);
            $this->assertStringContainsString("btn-{$type}", $class);
        }
    }

    public function testConstructorWithAdditionalClass(): void
    {
        $properties = ['class' => 'btn-lg'];
        $button = new LinkButton('#', 'Large Button', 'primary', $properties);
        
        $class = $button->getTagProperty('class');
        $this->assertStringContainsString('btn', $class);
        $this->assertStringContainsString('btn-primary', $class);
        $this->assertStringContainsString('btn-lg', $class);
    }

    public function testConstructorWithMultipleProperties(): void
    {
        $properties = [
            'class' => 'btn-block active',
            'id' => 'submit-btn',
            'data-toggle' => 'modal',
        ];
        $button = new LinkButton('#modal', 'Open Modal', 'success', $properties);
        
        $class = $button->getTagProperty('class');
        $this->assertStringContainsString('btn-success', $class);
        $this->assertStringContainsString('btn-block', $class);
        $this->assertStringContainsString('active', $class);
        $this->assertEquals('submit-btn', $button->getTagProperty('id'));
        $this->assertEquals('modal', $button->getTagProperty('data-toggle'));
    }

    public function testExtendsHtmlATag(): void
    {
        $this->assertInstanceOf(\Ease\Html\ATag::class, $this->object);
    }
}