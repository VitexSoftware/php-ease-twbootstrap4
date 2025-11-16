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

use Ease\TWB4\Table;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Table.
 */
class TableTest extends TestCase
{
    protected Table $object;

    protected function setUp(): void
    {
        $this->object = new Table();
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithNoParameters(): void
    {
        $table = new Table();
        $this->assertInstanceOf(Table::class, $table);
        $this->assertStringContainsString('table', $table->getTagProperty('class'));
    }

    public function testConstructorWithContent(): void
    {
        $content = new \Ease\Html\TrTag();
        $table = new Table($content);
        $this->assertStringContainsString('table', $table->getTagProperty('class'));
    }

    public function testConstructorWithAdditionalClasses(): void
    {
        $properties = ['class' => 'table-striped table-bordered'];
        $table = new Table(null, $properties);
        
        $class = $table->getTagProperty('class');
        $this->assertStringContainsString('table', $class);
        $this->assertStringContainsString('table-striped', $class);
        $this->assertStringContainsString('table-bordered', $class);
    }

    public function testExtendsHtmlTableTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\TableTag::class, $this->object);
    }
}