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

use Ease\TWB4\CardBody;
use PHPUnit\Framework\TestCase;

/**
 * Test class for CardBody.
 */
class CardBodyTest extends TestCase
{
    protected CardBody $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new CardBody();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    /**
     * Test constructor with no parameters.
     */
    public function testConstructorWithNoParameters(): void
    {
        $cardBody = new CardBody();
        $this->assertInstanceOf(CardBody::class, $cardBody);
        $this->assertStringContainsString('card-body', $cardBody->getTagProperty('class'));
    }

    /**
     * Test constructor with content only.
     */
    public function testConstructorWithContent(): void
    {
        $content = 'Test content';
        $cardBody = new CardBody($content);
        $this->assertInstanceOf(CardBody::class, $cardBody);
        $this->assertStringContainsString('card-body', $cardBody->getTagProperty('class'));
    }

    /**
     * Test constructor with content and empty properties.
     */
    public function testConstructorWithContentAndEmptyProperties(): void
    {
        $content = 'Test content';
        $cardBody = new CardBody($content, []);
        $this->assertInstanceOf(CardBody::class, $cardBody);
        $this->assertStringContainsString('card-body', $cardBody->getTagProperty('class'));
    }

    /**
     * Test constructor with additional class in properties.
     */
    public function testConstructorWithAdditionalClass(): void
    {
        $content = 'Test content';
        $properties = ['class' => 'custom-class'];
        $cardBody = new CardBody($content, $properties);
        
        $class = $cardBody->getTagProperty('class');
        $this->assertStringContainsString('card-body', $class);
        $this->assertStringContainsString('custom-class', $class);
    }

    /**
     * Test constructor with multiple additional classes.
     */
    public function testConstructorWithMultipleAdditionalClasses(): void
    {
        $properties = ['class' => 'custom-class another-class'];
        $cardBody = new CardBody(null, $properties);
        
        $class = $cardBody->getTagProperty('class');
        $this->assertStringContainsString('card-body', $class);
        $this->assertStringContainsString('custom-class', $class);
        $this->assertStringContainsString('another-class', $class);
    }

    /**
     * Test constructor with other properties.
     */
    public function testConstructorWithOtherProperties(): void
    {
        $properties = [
            'id' => 'test-card-body',
            'data-test' => 'value',
        ];
        $cardBody = new CardBody('Content', $properties);
        
        $this->assertEquals('test-card-body', $cardBody->getTagProperty('id'));
        $this->assertEquals('value', $cardBody->getTagProperty('data-test'));
    }

    /**
     * Test that card-body class is always present.
     */
    public function testCardBodyClassAlwaysPresent(): void
    {
        $cardBody1 = new CardBody();
        $this->assertStringContainsString('card-body', $cardBody1->getTagProperty('class'));
        
        $cardBody2 = new CardBody('content');
        $this->assertStringContainsString('card-body', $cardBody2->getTagProperty('class'));
        
        $cardBody3 = new CardBody(null, ['class' => 'other']);
        $this->assertStringContainsString('card-body', $cardBody3->getTagProperty('class'));
    }

    /**
     * Test constructor with complex content objects.
     */
    public function testConstructorWithComplexContent(): void
    {
        $content = new \Ease\Html\PTag('Paragraph content');
        $cardBody = new CardBody($content);
        
        $this->assertInstanceOf(CardBody::class, $cardBody);
        $this->assertStringContainsString('card-body', $cardBody->getTagProperty('class'));
    }

    /**
     * Test that CardBody extends DivTag.
     */
    public function testExtendsHtmlDivTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $this->object);
    }
}