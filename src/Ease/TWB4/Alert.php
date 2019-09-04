<?php

namespace Ease\TWB4;

use Ease\Html\DivTag;


/**
 * Twitter Bootrstap4 Alert.
 *
 * @author    Vitex <vitex@hippy.cz>
 * @copyright 2019 Vitex@hippy.cz (G)
 */
class Alert extends DivTag
{

    /**
     * Bootstrap4's Alert
     * @link https://v4-alpha.getbootstrap.com/components/alerts/
     *
     * @param string $type       success|info|warning|danger
     * @param mixed $content     to insert in
     * @param array $properties  additional
     */
    public function __construct($type, $content = null, $properties = [])
    {
        $properties['role'] = 'alert';
        parent::__construct($content, $properties);
        $this->addTagClass('alert alert-'.$type);
    }
}
