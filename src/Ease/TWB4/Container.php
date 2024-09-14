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

class Container extends \Ease\Html\DivTag
{
    /**
     * Twitter Bootrstap Container.
     *
     * @param mixed $content
     * @param array $properties of Container Row
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct($content, $properties);
        $this->addTagClass('container');
    }
}
