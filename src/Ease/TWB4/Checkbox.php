<?php

/**
 * Checkbox pro TwitterBootstrap4.
 */

namespace Ease\TWB4;

class Checkbox extends \Ease\Html\DivTag
{
    /**
     * Odkaz na checkbox.
     *
     * @var \Ease\Html\CheckboxTag
     */
    public $checkbox = null;

    /**
     * Checkbox pro TwitterBootstrap4.
     *
     * @param string     $name
     * @param string|int $value
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
        $this->addItem(new \Ease\Html\LabelTag($this->checkbox->getTagID(), $content)) ;
    }
}
