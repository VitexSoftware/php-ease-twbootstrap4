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
 * Twitter Bootrstap Well.
 */
class Well extends Card
{
    /**
     * Twitter Bootrstap Well.
     *
     * @param mixed $content
     * @param mixed $properties
     */
    public function __construct($content = null, array $properties = [])
    {
        parent::__construct($content, $properties);
        //        $this->addTagClass('well');
    }
}
