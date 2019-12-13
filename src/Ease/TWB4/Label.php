<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ease\TWB4;

/**
 * TWB3 Compatibility class
 * 
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Label extends Card
{

    /**
     * TWB3 Backward compatibility Label
     * 
     * @param string $type       alert|success|danger| etc...
     * @param mixed  $content    Content inside label
     * @param array  $properties additonal properrties for Card
     */
    public function __construct($type, $content, $properties = [])
    {
        if (array_key_exists('class', $properties)) {
            $properties['class'] = 'bg-'.$type.' '.$properties['class'];
        } else {
            $properties['class'] = 'bg-'.$type;
        }
        parent::__construct($content, $properties);
    }
}
