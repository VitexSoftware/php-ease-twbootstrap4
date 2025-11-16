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

use Ease\TWB4\ProgressBar;
use PHPUnit\Framework\TestCase;

/**
 * Test class for ProgressBar.
 */
class ProgressBarTest extends TestCase
{
    protected ProgressBar $object;

    protected function setUp(): void
    {
        $this->object = new ProgressBar(50);
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithValue(): void
    {
        $progressBar = new ProgressBar(75);
        $this->assertInstanceOf(ProgressBar::class, $progressBar);
    }

    public function testConstructorWithZeroValue(): void
    {
        $progressBar = new ProgressBar(0);
        $this->assertInstanceOf(ProgressBar::class, $progressBar);
    }

    public function testConstructorWithFullValue(): void
    {
        $progressBar = new ProgressBar(100);
        $this->assertInstanceOf(ProgressBar::class, $progressBar);
    }

    public function testConstructorWithType(): void
    {
        $types = ['success', 'info', 'warning', 'danger'];
        
        foreach ($types as $type) {
            $progressBar = new ProgressBar(50, $type);
            $this->assertInstanceOf(ProgressBar::class, $progressBar);
        }
    }

    public function testConstructorWithLabel(): void
    {
        $progressBar = new ProgressBar(60, null, true);
        $this->assertInstanceOf(ProgressBar::class, $progressBar);
    }

    public function testConstructorWithStriped(): void
    {
        $progressBar = new ProgressBar(50, null, false, true);
        $this->assertInstanceOf(ProgressBar::class, $progressBar);
    }

    public function testConstructorWithAllParameters(): void
    {
        $progressBar = new ProgressBar(75, 'success', true, true);
        $this->assertInstanceOf(ProgressBar::class, $progressBar);
    }

    public function testExtendsHtmlDivTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $this->object);
    }
}