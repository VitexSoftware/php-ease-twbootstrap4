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

use Ease\TWB4\Well;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Well.
 */
class WellTest extends TestCase
{
    protected Well $object;

    protected function setUp(): void
    {
        $this->object = new Well();
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithNoParameters(): void
    {
        $well = new Well();
        $this->assertInstanceOf(Well::class, $well);
    }

    public function testConstructorWithContent(): void
    {
        $content = 'Well content';
        $well = new Well($content);
        
        $this->assertInstanceOf(Well::class, $well);
    }

    public function testConstructorWithProperties(): void
    {
        $properties = ['id' => 'main-well', 'class' => 'well-lg'];
        $well = new Well('Content', $properties);
        
        $this->assertEquals('main-well', $well->getTagProperty('id'));
    }

    public function testExtendsCard(): void
    {
        $this->assertInstanceOf(\Ease\TWB4\Card::class, $this->object);
    }
}