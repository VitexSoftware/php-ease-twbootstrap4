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
 * Description of Table.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Table extends \Ease\Html\TableTag
{
    /**
     * TWB4 Table.
     *
     * @param mixed $content    tag content
     * @param array $properties table tag options
     */
    public function __construct($content = null, array $properties = [])
    {
        parent::__construct($content,$properties);
        $this->addTagClass('table');
    }
}
