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

use Ease\Html\DivTag;

/**
 * Bootstrap 4 Card Body component.
 * 
 * Renders a div element with the 'card-body' CSS class for use within Bootstrap card components.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class CardBody extends DivTag
{
    /**
     * Card.
     *
     * @param mixed                 $content    Content to be added to the card body
     * @param array<string, string> $properties
     */
    public function __construct($content = null, array $properties = [])
    {
        if (\array_key_exists('class', $properties)) {
            $properties['class'] = 'card-body '.$properties['class'];
        } else {
            $properties['class'] = 'card-body';
        }

        parent::__construct($content, $properties);
    }
}
