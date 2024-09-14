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

class Checkbox extends \Ease\Html\DivTag
{
    /**
     * Odkaz na checkbox.
     */
    public \Ease\Html\CheckboxTag $checkbox = null;

    /**
     * Checkbox pro TwitterBootstrap4.
     *
     * @param string     $name
     * @param int|string $value
     * @param mixed      $content
     * @param bool       $checked
     * @param array      $properties
     */
    public function __construct(
        $name = null,
        $value = 'on',
        $content = null,
        $checked = false,
        $properties = []
    ) {
        parent::__construct(null, ['class' => 'form-check']);
        $this->checkbox = $this->addItem(new \Ease\Html\CheckboxTag($name, $checked, $value, $properties));
        $this->checkbox->setTagID($name);
        $this->addItem(new \Ease\Html\LabelTag($this->checkbox->getTagID(), $content));
    }
}
