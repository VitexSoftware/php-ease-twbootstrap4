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
 * Twitter Bootstrap4 Alert.
 *
 * @author    Vitex <vitex@hippy.cz>
 * @copyright 2024 Vitex@hippy.cz (G)
 */
class ProgressBar extends \Ease\Html\DivTag
{
    public int $min = 0;
    public int $max = 100;

    /**
     * ProgressBar.
     *
     * @see https://getbootstrap.com/docs/4.0/components/progress/
     *
     * @param int    $value      0-100
     * @param string $label      progress bar caption
     * @param string $tweaks     progress-bar-striped progress-bar-animated bg-info
     * @param array  $properties of main div of progress bar
     */
    public function __construct($value = 0, $label = '', $tweaks = '', $properties = [])
    {
        $properties['class'] = 'progress';
        parent::__construct($this->bar($value, $label, $tweaks), $properties);
    }

    /**
     * ProgressBar core.
     *
     * @param mixed  $value
     * @param string $label
     * @param string $tweaks
     *
     * @return \Ease\Html\DivTag
     */
    public function bar($value, $label = '', $tweaks = '')
    {
        return new \Ease\Html\DivTag($label, [
            'class' => 'progress-bar '.$tweaks,
            'role' => 'progressbar',
            'aria-valuenow' => $value,
            'aria-valuemin' => $this->min,
            'aria-valuemax' => $this->max,
            'style' => 'width: '.$value.'%',
        ]);
    }
}
