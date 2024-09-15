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
 * Odesílací tlačítko formuláře Twitter Bootstrapu.
 */
class SubmitButton extends \Ease\Html\ButtonTag
{
    /**
     * Odesílací tlačítko formuláře Twitter Bootstrapu.
     *
     * @param string $value      vracená hodnota
     * @param string $type       primary|info|success|warning|danger|inverse|link
     * @param mixed  $properties
     */
    public function __construct($value = null, $type = null, array $properties = [])
    {
        if (null === $type) {
            $properties['class'] = 'btn';
        } else {
            $properties['class'] = 'btn btn-'.$type;
        }

        parent::__construct($value, $properties);
    }
}
