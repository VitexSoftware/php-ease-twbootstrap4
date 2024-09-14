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
 * Twitter Bootstrap4 Alert.
 *
 * @author    Vitex <vitex@hippy.cz>
 * @copyright 2019-2024 Vitex@hippy.cz (G)
 */
class Alert extends DivTag
{
    /**
     * Bootstrap4's Alert.
     *
     * @see https://v4-alpha.getbootstrap.com/components/alerts/
     *
     * @param string $type       success|info|warning|danger
     * @param mixed  $content    to insert in
     * @param array  $properties additional
     */
    public function __construct($type, $content = null, $properties = [])
    {
        $properties['role'] = 'alert';
        parent::__construct($content, $properties);
        $this->addTagClass('alert alert-'.$type);
    }
}
