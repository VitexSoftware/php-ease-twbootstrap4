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
    public function __construct($content = null, $properties = []){
        if(array_key_exists('class', $properties)){
            $prperties['class'] = 'card '.$prperties['class'];
        } else {
            $prperties['class'] = 'card';
        }
        parent::__construct($content,$properties);
    }
}
