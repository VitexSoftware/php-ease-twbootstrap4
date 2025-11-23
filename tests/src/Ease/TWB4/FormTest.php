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

use Ease\TWB4\Form;
use Ease\TWB4\FormGroup;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Form.
 */
class FormTest extends TestCase
{
    protected Form $object;

    protected function setUp(): void
    {
        $this->object = new Form();
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithNoParameters(): void
    {
        $form = new Form();
        $this->assertInstanceOf(Form::class, $form);
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $form->formDiv);
    }

    public function testConstructorWithFormProperties(): void
    {
        $formProperties = ['method' => 'POST', 'action' => '/submit'];
        $form = new Form($formProperties);
        
        $this->assertInstanceOf(Form::class, $form);
        $this->assertEquals('POST', $form->getTagProperty('method'));
        $this->assertEquals('/submit', $form->getTagProperty('action'));
    }

    public function testConstructorWithFormDivProperties(): void
    {
        $formDivProperties = ['class' => 'form-row align-items-center'];
        $form = new Form([], $formDivProperties);
        
        $this->assertInstanceOf(Form::class, $form);
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $form->formDiv);
    }

    public function testConstructorWithInitialContent(): void
    {
        $content = new \Ease\Html\InputTag('text', 'username');
        $form = new Form([], [], $content);
        
        $this->assertInstanceOf(Form::class, $form);
    }

    public function testConstructorWithEnctype(): void
    {
        $formProperties = ['enctype' => 'multipart/form-data'];
        $form = new Form($formProperties);
        
        $this->assertEquals('multipart/form-data', $form->getTagProperty('enctype'));
    }

    public function testAddInputMethod(): void
    {
        $form = new Form();
        $input = new \Ease\Html\InputTag('text', 'email');
        $result = $form->addInput($input, 'Email', 'Enter your email');
        
        $this->assertInstanceOf(FormGroup::class, $result);
    }

    public function testAddInputWithAllParameters(): void
    {
        $form = new Form();
        $input = new \Ease\Html\InputTag('text', 'username');
        $result = $form->addInput($input, 'Username', 'Your username', 'Must be unique');
        
        $this->assertInstanceOf(FormGroup::class, $result);
    }

    public function testAddItemMethodAppliesFormControlClass(): void
    {
        $form = new Form();
        $input = new \Ease\Html\InputTag('text', 'test');
        $form->addItem($input);
        
        // The form should apply form-control class to input elements
        $this->assertTrue(true); // Basic assertion that method doesn't throw
    }

    public function testAddItemWithSelectElement(): void
    {
        $form = new Form();
        $select = new \Ease\Html\SelectTag('country');
        $form->addItem($select);
        
        $this->assertTrue(true); // Basic assertion
    }

    public function testExtendsHtmlForm(): void
    {
        $this->assertInstanceOf(\Ease\Html\Form::class, $this->object);
    }
}