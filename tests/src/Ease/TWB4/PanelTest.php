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

use Ease\TWB4\Panel;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Panel.
 */
class PanelTest extends TestCase
{
    protected Panel $object;

    protected function setUp(): void
    {
        $this->object = new Panel();
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithNoParameters(): void
    {
        $panel = new Panel();
        $this->assertInstanceOf(Panel::class, $panel);
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $panel->header);
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $panel->body);
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $panel->footer);
    }

    public function testConstructorWithHeading(): void
    {
        $panel = new Panel('Panel Title');
        $this->assertInstanceOf(Panel::class, $panel);
    }

    public function testConstructorWithType(): void
    {
        $types = ['success', 'warning', 'info', 'danger'];
        
        foreach ($types as $type) {
            $panel = new Panel('Title', $type);
            $this->assertInstanceOf(Panel::class, $panel);
        }
    }

    public function testConstructorWithBody(): void
    {
        $body = 'Panel body content';
        $panel = new Panel('Title', null, $body);
        
        $this->assertInstanceOf(Panel::class, $panel);
    }

    public function testConstructorWithFooter(): void
    {
        $footer = 'Panel footer';
        $panel = new Panel('Title', null, 'Body', $footer);
        
        $this->assertInstanceOf(Panel::class, $panel);
    }

    public function testConstructorWithAllParameters(): void
    {
        $panel = new Panel('Panel Heading', 'success', 'Panel Body', 'Panel Footer');
        
        $this->assertInstanceOf(Panel::class, $panel);
        $this->assertEquals('default', $panel->type);
    }

    public function testAddItemMethodAddsToBody(): void
    {
        $panel = new Panel('Test');
        $content = new \Ease\Html\PTag('Paragraph');
        $added = $panel->addItem($content);
        
        $this->assertNotNull($added);
    }

    public function testAddMultipleItems(): void
    {
        $panel = new Panel('Test');
        $panel->addItem(new \Ease\Html\PTag('First'));
        $panel->addItem(new \Ease\Html\PTag('Second'));
        $panel->addItem(new \Ease\Html\PTag('Third'));
        
        $this->assertInstanceOf(Panel::class, $panel);
    }

    public function testExtendsCard(): void
    {
        $this->assertInstanceOf(\Ease\TWB4\Card::class, $this->object);
    }
}