<?php

/**
 * Twitter Bootrstap Container Fluid.
 *
 * @author    Vitex <vitex@hippy.cz>
 * @copyright 2009-2021 Vitex@hippy.cz (G)
 */

namespace Ease\TWB4;

class ContainerFluid extends \Ease\Html\DivTag
{
    /**
     * Twitter Bootrstap fluid Container.
     *
     * @param mixed $content
     * @param array $properties of Container Row
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct($content, $properties);
        $this->addTagClass('container-fluid');
    }
}
