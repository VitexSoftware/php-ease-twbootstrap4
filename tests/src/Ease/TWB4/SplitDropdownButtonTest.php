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

use Ease\TWB4\SplitDropdownButton;
use PHPUnit\Framework\TestCase;

class SplitDropdownButtonTest extends TestCase
{
    public function testRendersRightSplitDropdownButton(): void
    {
        $items = [
            '#action' => 'Action',
            '#another' => 'Another action',
            '#something' => 'Something else here',
            '' => '', // Divider
            '#separated' => 'Separated link',
        ];
        $button = new SplitDropdownButton('Action', 'danger', $items, 'right');
        $html = $button->__toString();
        $this->assertStringContainsString('btn-group', $html);
        $this->assertStringContainsString('btn btn-danger', $html);
        $this->assertStringContainsString('dropdown-toggle-split', $html);
        $this->assertStringContainsString('dropdown-menu', $html);
        $this->assertStringContainsString('Separated link', $html);
        // Ensure main button comes before toggle for right
        $mainPos = strpos($html, 'Action</button>');
        $togglePos = strpos($html, 'dropdown-toggle-split');
        $this->assertTrue($mainPos < $togglePos);
    }

    public function testRendersLeftSplitDropdownButton(): void
    {
        $items = [
            '#foo' => 'Foo',
            '#bar' => 'Bar',
        ];
        $button = new SplitDropdownButton('Test', 'primary', $items, 'left');
        $html = $button->__toString();
        // Ensure toggle comes before main for left
        $togglePos = strpos($html, 'dropdown-toggle-split');
        $mainPos = strpos($html, 'Test</button>');
        $this->assertTrue($togglePos < $mainPos);
    }

    public function testDropdownMenuItems(): void
    {
        $items = [
            '#a' => 'A',
            '' => '', // Divider
            '#b' => 'B',
        ];
        $button = new SplitDropdownButton('Menu', 'info', $items);
        $html = $button->__toString();
        $this->assertStringContainsString('dropdown-divider', $html);
        $this->assertStringContainsString('A', $html);
        $this->assertStringContainsString('B', $html);
    }
}
