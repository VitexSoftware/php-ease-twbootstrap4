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
 * Odkazové tlačítko twbootstrabu.
 *
 * @author    Vítězslav Dvořák <vitex@hippy.cz>
 * @copyright 2012-2017 Vitex@vitexsoftware.cz (G)
 *
 * @see      http://twitter.github.com/bootstrap/base-css.html#buttons Buttons
 */
class LinkButton extends \Ease\Html\ATag
{
    /**
     * Odkazové tlačítko twbootstrabu.
     *
     * @param string                $href       URL
     * @param mixed                 $contents   Button Label
     * @param string                $type       primary|info|success|warning|danger|inverse|link
     * @param array<string, string> $properties additional properties
     */
    public function __construct(
        $href,
        $contents = null,
        string $type = '',
        array $properties = [],
    ) {
        if (isset($properties['class'])) {
            $class = ' '.$properties['class'];
        } else {
            $class = '';
        }

        if (empty($type)) {
            $properties['class'] = 'btn btn-default';
        } else {
            $properties['class'] = 'btn btn-'.$type;
        }

        $properties['class'] .= $class;
        parent::__construct($href, $contents, $properties);
    }
}
