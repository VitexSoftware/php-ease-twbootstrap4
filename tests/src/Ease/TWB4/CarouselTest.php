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

use Ease\TWB4\Carousel;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Carousel.
 */
class CarouselTest extends TestCase
{
    protected Carousel $object;

    protected function setUp(): void
    {
        $this->object = new Carousel();
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithNoParameters(): void
    {
        $carousel = new Carousel();
        $this->assertInstanceOf(Carousel::class, $carousel);
    }

    public function testConstructorWithId(): void
    {
        $carousel = new Carousel('main-carousel');
        $this->assertInstanceOf(Carousel::class, $carousel);
    }

    public function testConstructorWithProperties(): void
    {
        $properties = ['data-interval' => '5000', 'data-ride' => 'carousel'];
        $carousel = new Carousel('carousel-1', $properties);
        
        $this->assertEquals('5000', $carousel->getTagProperty('data-interval'));
        $this->assertEquals('carousel', $carousel->getTagProperty('data-ride'));
    }

    public function testAddSlideMethod(): void
    {
        $carousel = new Carousel();
        $image = new \Ease\Html\ImgTag('image.jpg', 'Slide');
        $carousel->addSlide($image);
        
        $this->assertInstanceOf(Carousel::class, $carousel);
    }

    public function testAddSlideWithCaption(): void
    {
        $carousel = new Carousel();
        $image = new \Ease\Html\ImgTag('image.jpg', 'Slide');
        $carousel->addSlide($image, 'Caption Title', 'Caption text');
        
        $this->assertInstanceOf(Carousel::class, $carousel);
    }

    public function testAddMultipleSlides(): void
    {
        $carousel = new Carousel();
        
        for ($i = 1; $i <= 3; $i++) {
            $image = new \Ease\Html\ImgTag("image{$i}.jpg", "Slide {$i}");
            $carousel->addSlide($image, "Title {$i}", "Description {$i}");
        }
        
        $this->assertInstanceOf(Carousel::class, $carousel);
    }

    public function testExtendsHtmlDivTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $this->object);
    }
}