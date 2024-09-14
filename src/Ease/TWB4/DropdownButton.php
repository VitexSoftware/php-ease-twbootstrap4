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
 * Description of Dropdown.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class DropdownButton extends DropdownLink
{
    /**
     * Dropdown handle.
     *
     * @param string $heading
     * @param string $type    one of primary|secondary|success|danger|warning|info|light|dark|link
     *
     * @return \Ease\Html\ButtonTag
     */
    public function handle($heading, $type)
    {
        $handle = new \Ease\Html\ButtonTag(
            $heading,
            ['class' => 'btn btn-'.$type.' dropdown-toggle', 'type' => 'button',
                'data-toggle' => 'dropdown',
                'aria-haspopup' => 'true',
                'aria-expanded' => 'false'],
        );
        $handle->setTagID($heading);

        return $handle;
    }
}
