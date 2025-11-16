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

use Ease\TWB4\Breadcrumb;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Breadcrumb.
 */
class BreadcrumbTest extends TestCase
{
    protected Breadcrumb $object;

    protected function setUp(): void
    {
        $this->object = new Breadcrumb();
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithNoParameters(): void
    {
        $breadcrumb = new Breadcrumb();
        $this->assertInstanceOf(Breadcrumb::class, $breadcrumb);
        $this->assertEquals('breadcrumb', $breadcrumb->getTagProperty('aria-label'));
        $this->assertInstanceOf(\Ease\Html\OlTag::class, $breadcrumb->ol);
    }

    public function testConstructorWithContent(): void
    {
        $content = new \Ease\Html\LiTag('Home');
        $breadcrumb = new Breadcrumb($content);
        
        $this->assertInstanceOf(Breadcrumb::class, $breadcrumb);
    }

    public function testConstructorWithProperties(): void
    {
        $properties = ['id' => 'main-breadcrumb'];
        $breadcrumb = new Breadcrumb(null, $properties);
        
        $this->assertEquals('main-breadcrumb', $breadcrumb->getTagProperty('id'));
        $this->assertEquals('breadcrumb', $breadcrumb->getTagProperty('aria-label'));
    }

    public function testAddPageMethod(): void
    {
        $breadcrumb = new Breadcrumb();
        $page = $breadcrumb->addPage('Home', '/');
        
        $this->assertInstanceOf(\Ease\Html\LiTag::class, $page);
    }

    public function testAddMultiplePages(): void
    {
        $breadcrumb = new Breadcrumb();
        $breadcrumb->addPage('Home', '/');
        $breadcrumb->addPage('Products', '/products');
        $breadcrumb->addPage('Category', '/products/category');
        
        $this->assertInstanceOf(Breadcrumb::class, $breadcrumb);
    }

    public function testAddCurrentPageMethod(): void
    {
        $breadcrumb = new Breadcrumb();
        $currentPage = $breadcrumb->addCurrentPage('Current Page');
        
        $this->assertInstanceOf(\Ease\Html\LiTag::class, $currentPage);
    }

    public function testCompleteBreadcrumbFlow(): void
    {
        $breadcrumb = new Breadcrumb();
        $breadcrumb->addPage('Home', '/');
        $breadcrumb->addPage('Products', '/products');
        $breadcrumb->addCurrentPage('Product Details');
        
        $this->assertInstanceOf(Breadcrumb::class, $breadcrumb);
    }

    public function testAddItemMethod(): void
    {
        $breadcrumb = new Breadcrumb();
        $item = new \Ease\Html\LiTag('Custom Item');
        $result = $breadcrumb->addItem($item);
        
        $this->assertNotNull($result);
    }

    public function testExtendsHtmlNavTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\NavTag::class, $this->object);
    }
}