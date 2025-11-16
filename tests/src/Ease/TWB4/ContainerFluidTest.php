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

use Ease\TWB4\ContainerFluid;
use PHPUnit\Framework\TestCase;

/**
 * Test class for ContainerFluid.
 */
class ContainerFluidTest extends TestCase
{
    protected ContainerFluid $object;

    protected function setUp(): void
    {
        $this->object = new ContainerFluid();
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithNoParameters(): void
    {
        $container = new ContainerFluid();
        $this->assertInstanceOf(ContainerFluid::class, $container);
        $this->assertStringContainsString('container-fluid', $container->getTagProperty('class'));
    }

    public function testConstructorWithContent(): void
    {
        $content = 'Fluid container content';
        $container = new ContainerFluid($content);
        $this->assertStringContainsString('container-fluid', $container->getTagProperty('class'));
    }

    public function testExtendsHtmlDivTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $this->object);
    }
}