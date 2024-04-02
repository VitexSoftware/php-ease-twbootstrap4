<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ease\TWB4;

/**
 * Description of Table
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Table extends \Ease\Html\TableTag
{
    /**
     * TWB4 Table.
     *
     * @param mixed $content    tag content
     * @param array $properties table tag options
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct($properties, $content);
        $this->addTagClass('table');
    }
}
