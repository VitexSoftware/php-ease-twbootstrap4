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
 * Description of ModalToggleButton
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class ModalToggleButton extends \Ease\Html\ButtonTag
{
    /**
     * Modal Toggle Button.
     *
     * @param string $content    button content
     * @param Modal  $modal      modal to toggle
     * @param array  $properties button properties
     */
    public function __construct($content, $modal, $properties = [])
    {
        if (array_key_exists('class', $properties) === false) {
            $properties['class'] = 'btn btn-primary';
        }
        $properties['data-toggle'] = 'modal';
        $properties['data-target'] = '#' . $modal->getTagID();
        parent::__construct($content, $properties);
    }
}
