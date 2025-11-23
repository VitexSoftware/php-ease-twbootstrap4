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

use Ease\TWB4\FormGroup;
use PHPUnit\Framework\TestCase;

/**
 * Test class for FormGroup.
 */
class FormGroupTest extends TestCase
{
    protected FormGroup $object;

    protected function setUp(): void
    {
        $input = new \Ease\Html\InputTag('text', 'test');
        $this->object = new FormGroup('Test Label', $input);
    }

    protected function tearDown(): void
    {
    }

    public function testConstructorWithLabelAndInput(): void
    {
        $input = new \Ease\Html\InputTag('text', 'email');
        $formGroup = new FormGroup('Email', $input);
        
        $this->assertInstanceOf(FormGroup::class, $formGroup);
        $this->assertStringContainsString('form-group', $formGroup->getTagProperty('class'));
    }

    public function testConstructorWithPlaceholder(): void
    {
        $input = new \Ease\Html\InputTag('text', 'username');
        $formGroup = new FormGroup('Username', $input, 'Enter username');
        
        $this->assertInstanceOf(FormGroup::class, $formGroup);
    }

    public function testConstructorWithHelptext(): void
    {
        $input = new \Ease\Html\InputTag('password', 'password');
        $formGroup = new FormGroup('Password', $input, null, 'Must be at least 8 characters');
        
        $this->assertInstanceOf(FormGroup::class, $formGroup);
    }

    public function testConstructorWithAllParameters(): void
    {
        $input = new \Ease\Html\InputTag('email', 'email');
        $formGroup = new FormGroup(
            'Email Address',
            $input,
            'you@example.com',
            'We will never share your email',
            'form-control'
        );
        
        $this->assertInstanceOf(FormGroup::class, $formGroup);
    }

    public function testConstructorWithCustomAddTagClass(): void
    {
        $input = new \Ease\Html\InputTag('text', 'custom');
        $formGroup = new FormGroup('Custom', $input, null, null, 'custom-class');
        
        $this->assertInstanceOf(FormGroup::class, $formGroup);
    }

    public function testConstructorWithNullLabel(): void
    {
        $input = new \Ease\Html\InputTag('text', 'nolabel');
        $formGroup = new FormGroup(null, $input);
        
        $this->assertInstanceOf(FormGroup::class, $formGroup);
    }

    public function testConstructorGeneratesFormKeyFromLabel(): void
    {
        $input = new \Ease\Html\InputTag('text');
        $formGroup = new FormGroup('Test Label Here', $input);
        
        $this->assertInstanceOf(FormGroup::class, $formGroup);
    }

    public function testExtendsHtmlDivTag(): void
    {
        $this->assertInstanceOf(\Ease\Html\DivTag::class, $this->object);
    }
}