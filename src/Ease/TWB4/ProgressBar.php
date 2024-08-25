<?php

namespace Ease\TWB4;
/**
 * Twitter Bootstrap4 Alert.
 *
 * @author    Vitex <vitex@hippy.cz>
 * @copyright 2024 Vitex@hippy.cz (G)
 */

class ProgressBar extends \Ease\Html\DivTag
{
    /**
     *
     * @var int
     */
    public $min = 0;

    /**
     *
     * @var int
     */
    public $max = 100;

    /**
     *
     * @var int
     */
    public function __construct($value = 0, $label = '', $properties = [])
    {
        $properties['class'] = 'progress';
        parent::__construct(new \Ease\Html\DivTag($label, [
                    'class' => 'progress-bar',
                    'role' => 'progressbar',
                    'aria-valuenow' => $value,
                    'aria-valuemin' => $this->min,
                    'aria-valuemax' => $this->max,
                    'style' => 'width: ' . $value . '%'
                        ]), $properties);
    }
}
