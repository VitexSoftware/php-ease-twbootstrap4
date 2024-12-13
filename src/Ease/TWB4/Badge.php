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
 * Odznak bootstrapu.
 */
class Badge extends \Ease\Html\SpanTag
{
    /**
     * Návěstí bootstrapu.
     *
     * @see https://getbootstrap.com/docs/4.6/components/badge/
     *
     * @param string                $type       success|info|warning|danger
     * @param mixed                 $content    to insert in
     * @param array<string, string> $properties additional
     */
    public function __construct($type, $content = null, array $properties = [])
    {
        parent::__construct($content, $properties);
        $this->addTagClass('badge badge-'.$type);
    }
}
