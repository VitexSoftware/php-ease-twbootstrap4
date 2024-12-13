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
 * TWB3 Compatibility class.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Label extends Card
{
    /**
     * TWB3 Backward compatibility Label.
     *
     * @param string                $type       alert|success|danger| etc...
     * @param mixed                 $content    Content inside label
     * @param array<string, string> $properties additional properties for Card
     */
    public function __construct($type, $content, array $properties = [])
    {
        if (\array_key_exists('class', $properties)) {
            $properties['class'] = 'bg-'.$type.' '.$properties['class'];
        } else {
            $properties['class'] = 'bg-'.$type;
        }

        parent::__construct($content, $properties);
    }
}
