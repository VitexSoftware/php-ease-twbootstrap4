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

use Ease\TWB4\Part;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Part.
 */
class PartTest extends TestCase
{
    protected Part $object;

    protected function setUp(): void
    {
        $this->object = new Part();
    }

    protected function tearDown(): void
    {
    }

    public function testConstructor(): void
    {
        $part = new Part();
        $this->assertInstanceOf(Part::class, $part);
    }

    public function testTwBootstrapizeStaticMethod(): void
    {
        $result = Part::twBootstrapize();
        $this->assertTrue($result);
    }

    public function testExtendsEasePart(): void
    {
        $this->assertInstanceOf(\Ease\Part::class, $this->object);
    }
}