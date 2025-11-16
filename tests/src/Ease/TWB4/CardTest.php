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

use Ease\TWB4\Card;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Card.
 */
class CardTest extends TestCase
{
    protected Card $object;

    protected function setUp(): void
    {
        $this->object = new Card();
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithNoParameters(): void
    {
        $card = new Card();
        $this->assertInstanceOf(Card::class, $card);
        $this->assertStringContainsString('card', $card->getTagProperty('class'));
    }

    public function testConstructorWithContent(): void
    {
        $content = 'Card content';
        $card = new Card($content);
        $this->assertStringContainsString('card', $card->getTagProperty('class'));
    }

    public function testConstructorWithAdditionalClass(): void
    {
        $properties = ['class' => 'custom-card'];
        $card = new Card(null, $properties);
        
        $class = $card->getTagProperty('class');
        $this->assertStringContainsString('card', $class);
        $this->assertStringContainsString('custom-card', $class);
    }

    public function testConstructorWithMultipleProperties(): void
    {
        $properties = [
            'class' => 'shadow-lg',
            'id' => 'main-card',
            'data-toggle' => 'collapse',
        ];
        $card = new Card('Content', $properties);
        
        $this->assertStringContainsString('card', $card->getTagProperty('class'));
        $this->assertStringContainsString('shadow-lg', $card->getTagProperty('class'));
        $this->assertEquals('main-card', $card->getTagProperty('id'));
        $this->assertEquals('collapse', $card->getTagProperty('data-toggle'));
    }

    public function testCardClassAlwaysPresent(): void
    {
        $card1 = new Card();
        $this->assertStringContainsString('card', $card1->getTagProperty('class'));
        
        $card2 = new Card(null, ['class' => 'other']);
        $this->assertStringContainsString('card', $card2->getTagProperty('class'));
    }

    public function testExtendsHtmlDivTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $this->object);
    }
}