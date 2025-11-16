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

use Ease\TWB4\Label;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Label.
 */
class LabelTest extends TestCase
{
    protected Label $object;

    protected function setUp(): void
    {
        $this->object = new Label('success');
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithType(): void
    {
        $label = new Label('success');
        $this->assertInstanceOf(Label::class, $label);
    }

    public function testConstructorWithDifferentTypes(): void
    {
        $types = ['success', 'warning', 'danger', 'info', 'primary', 'secondary'];
        
        foreach ($types as $type) {
            $label = new Label($type);
            $this->assertInstanceOf(Label::class, $label);
        }
    }

    public function testConstructorWithContent(): void
    {
        $label = new Label('success', 'Label Text');
        $this->assertInstanceOf(Label::class, $label);
    }

    public function testConstructorWithProperties(): void
    {
        $properties = ['id' => 'status-label', 'title' => 'Status'];
        $label = new Label('success', 'Active', $properties);
        
        $this->assertEquals('status-label', $label->getTagProperty('id'));
        $this->assertEquals('Status', $label->getTagProperty('title'));
    }

    public function testExtendsHtmlSpanTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\SpanTag::class, $this->object);
    }
}