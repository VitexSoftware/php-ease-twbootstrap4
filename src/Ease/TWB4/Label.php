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
     * 
     * @param string $type
     * @param mixed $content
     * @param array $poperties
     */
    public function __construct($type, $content , $poperties)
    {
        if(array_key_exists('class', $properties)){
            $poperties['class']='bg-'.$type.' '.$poperties['class'];
        } else {
            $poperties['class']='bg-'.$type;
        }
        parent::__construct($content = null, $poperties);
    }
}
