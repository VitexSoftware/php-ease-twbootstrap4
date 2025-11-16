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

use Ease\TWB4\Col;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Col.
 */
class ColTest extends TestCase
{
    protected Col $object;

    protected function setUp(): void
    {
        $this->object = new Col(6);
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithSize(): void
    {
        $col = new Col(6);
        $this->assertInstanceOf(Col::class, $col);
        $this->assertStringContainsString('col-md-6', $col->getTagProperty('class'));
    }

    public function testConstructorWithDifferentSizes(): void
    {
        $sizes = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        
        foreach ($sizes as $size) {
            $col = new Col($size);
            $this->assertStringContainsString("col-md-{$size}", $col->getTagProperty('class'));
        }
    }

    public function testConstructorWithContent(): void
    {
        $content = 'Column content';
        $col = new Col(6, $content);
        $this->assertStringContainsString('col-md-6', $col->getTagProperty('class'));
    }

    public function testConstructorWithDifferentTargets(): void
    {
        $targets = ['xs', 'sm', 'md', 'lg', 'xl'];
        
        foreach ($targets as $target) {
            $col = new Col(6, null, $target);
            $this->assertStringContainsString("col-{$target}-6", $col->getTagProperty('class'));
        }
    }

    public function testConstructorWithAdditionalClass(): void
    {
        $properties = ['class' => 'custom-column'];
        $col = new Col(6, null, 'md', $properties);
        
        $class = $col->getTagProperty('class');
        $this->assertStringContainsString('col-md-6', $class);
        $this->assertStringContainsString('custom-column', $class);
    }

    public function testConstructorWithMultipleProperties(): void
    {
        $properties = [
            'class' => 'offset-md-2 align-self-center',
            'id' => 'main-col',
        ];
        $col = new Col(8, 'Content', 'md', $properties);
        
        $class = $col->getTagProperty('class');
        $this->assertStringContainsString('col-md-8', $class);
        $this->assertStringContainsString('offset-md-2', $class);
        $this->assertStringContainsString('align-self-center', $class);
        $this->assertEquals('main-col', $col->getTagProperty('id'));
    }

    public function testExtendsHtmlDivTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $this->object);
    }
}