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

class Col extends \Ease\Html\DivTag
{
    /**
     * Bunka CSS tabulky bootstrapu.
     *
     * @see  http://getbootstrap.com/css/#grid
     *
     * @param int                   $size       Column size 1 - 12
     * @param mixed                 $content    Content to put into Col div
     * @param string                $target     Device type xs|sm|md|lg
     * @param array<string,string>  $properties Additional properties
     */
    public function __construct(
        $size,
        $content = null,
        $target = 'md',
        array $properties = []
    ) {
        if (\array_key_exists('class', $properties)) {
            $addClass = $properties['class'];
        } else {
            $addClass = '';
        }

        $properties['class'] = 'col-'.$target.'-'.$size;
        parent::__construct($content, $properties);

        if (\strlen($addClass)) {
            $this->addTagClass($addClass);
        }
    }
}
