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

use Ease\TWB4\Row;
use Ease\TWB4\Col;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Row.
 */
class RowTest extends TestCase
{
    protected Row $object;

    protected function setUp(): void
    {
        $this->object = new Row();
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithNoParameters(): void
    {
        $row = new Row();
        $this->assertInstanceOf(Row::class, $row);
        $this->assertStringContainsString('row', $row->getTagProperty('class'));
    }

    public function testConstructorWithContent(): void
    {
        $content = 'Row content';
        $row = new Row($content);
        $this->assertStringContainsString('row', $row->getTagProperty('class'));
    }

    public function testAddColumnMethod(): void
    {
        $row = new Row();
        $column = $row->addColumn(6, 'Column content');
        
        $this->assertInstanceOf(Col::class, $column);
    }

    public function testAddColumnWithDifferentSizes(): void
    {
        $row = new Row();
        
        $col1 = $row->addColumn(12, 'Full width');
        $this->assertInstanceOf(Col::class, $col1);
        
        $col2 = $row->addColumn(6, 'Half width');
        $this->assertInstanceOf(Col::class, $col2);
        
        $col3 = $row->addColumn(4, 'Third width');
        $this->assertInstanceOf(Col::class, $col3);
    }

    public function testAddColumnWithTarget(): void
    {
        $row = new Row();
        $column = $row->addColumn(6, 'Content', 'lg');
        
        $this->assertInstanceOf(Col::class, $column);
    }

    public function testAddColumnWithProperties(): void
    {
        $row = new Row();
        $properties = ['id' => 'test-col', 'data-value' => 'test'];
        $column = $row->addColumn(6, 'Content', 'md', $properties);
        
        $this->assertInstanceOf(Col::class, $column);
    }

    public function testExtendsHtmlDivTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $this->object);
    }
}