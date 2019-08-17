<?php

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
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct($content, $properties);
//        $this->addTagClass('well');
    }
}
