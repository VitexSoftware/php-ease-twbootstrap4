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

namespace Ease\TWB4;

/**
 * Split Button Dropdown for Bootstrap 4.
 *
 * Example usage:
 * $splitButton = new SplitDropdownButton('Action', 'danger', [
 *     '#' => 'Action',
 *     '#' => 'Another action',
 *     '#' => 'Something else here',
 *     ''  => '', // Divider
 *     '#' => 'Separated link',
 * ]);
 * echo $splitButton;
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class SplitDropdownButton extends \Ease\Html\DivTag
{
    private $mainButton;
    private $toggleButton;
    private $dropdownMenu;
    private $position;

    public function __construct(
        $heading,
        $type = 'primary',
        $items = [],
        $position = 'right',
        array $properties = [],
    ) {
        $properties['class'] = 'btn-group';
        parent::__construct(null, $properties);
        \Ease\TWB4\Part::twBootstrapize();
        $this->position = $position;

        $this->mainButton = new \Ease\Html\ButtonTag(
            $heading,
            [
                'class' => 'btn btn-'.$type,
                'type' => 'button',
            ],
        );
        $this->mainButton->setTagID($heading.'-main');

        $this->toggleButton = new \Ease\Html\ButtonTag(
            '<span class="sr-only">Toggle Dropdown</span>',
            [
                'class' => 'btn btn-'.$type.' dropdown-toggle dropdown-toggle-split',
                'type' => 'button',
                'data-toggle' => 'dropdown',
                'aria-haspopup' => 'true',
                'aria-expanded' => 'false',
            ],
        );
        $this->toggleButton->setTagID($heading.'-toggle');

        $this->dropdownMenu = new \Ease\Html\DivTag(
            null,
            ['class' => 'dropdown-menu', 'aria-labelledby' => $heading.'-toggle'],
        );

        if (!empty($items)) {
            foreach ($items as $url => $label) {
                if ($label === '' && $url === '') {
                    $this->dropdownMenu->addItem(new \Ease\Html\DivTag(null, ['class' => 'dropdown-divider']));
                } else {
                    $this->dropdownMenu->addItem(new \Ease\Html\ATag($url, $label, ['class' => 'dropdown-item']));
                }
            }
        }
    }

    public function finalize(): void
    {
        if ($this->position === 'left') {
            $this->addItem($this->toggleButton);
            $this->addItem($this->mainButton);
        } else {
            $this->addItem($this->mainButton);
            $this->addItem($this->toggleButton);
        }

        $this->addItem($this->dropdownMenu);
        parent::finalize();
    }
}
