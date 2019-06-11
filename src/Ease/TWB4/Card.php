<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ease\TWB4;

use Ease\Html\DivTag;

/**
 * Description of Card
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Card extends DivTag
{

    public function __construct($content = null, $properties = [])
    {
        if (is_array($properties) && array_key_exists('class', $properties)) {
            $properties['class'] = 'card '.$properties['class'];
        } else {
            $properties['class'] = 'card';
        }
        parent::__construct($content, $properties);
    }
}
