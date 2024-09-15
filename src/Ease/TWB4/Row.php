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

class Row extends \Ease\Html\DivTag
{
    /**
     * Twitter Bootrstap Row.
     *
     * @param mixed $content    Initial content
     * @param array $properties Of Row Div
     */
    public function __construct($content = null, array $properties = [])
    {
        parent::__construct($content, $properties);
        $this->addTagClass('row');
    }

    /**
     * Vloží do řádku políčko.
     * Add Column into Row.
     *
     * @see   http://getbootstrap.com/css/#grid
     *
     * @param int    $size       Velikost políčka 1 - 12
     * @param mixed  $content    Obsah políčka
     * @param string $target     Typ zařízení xs|sm|md|lg
     * @param array  $properties Další vlastnosti tagu
     *
     * @return Col Column contains $content
     */
    public function &addColumn(
        $size,
        $content = null,
        $target = 'md',
        $properties = [],
    ) {
        $added = $this->addItem(new Col($size, $content, $target, $properties));

        return $added;
    }
}
