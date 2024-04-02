<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ease\TWB4;

/**
 * Description of Dropdown
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class DropdownButton extends DropdownLink
{
    /**
     * Dropdown handle
     *
     * @param string $heading
     * @param string $type       one of primary|secondary|success|danger|warning|info|light|dark|link
     *
     * @return \Ease\Html\ButtonTag
     */
    public function handle($heading, $type)
    {
        $handle = new \Ease\Html\ButtonTag(
            $heading,
            ['class' => 'btn btn-' . $type . ' dropdown-toggle', 'type' => 'button',
            'data-toggle' => 'dropdown',
            'aria-haspopup' => 'true',
            'aria-expanded' => 'false']
        );
        $handle->setTagID($heading);
        return $handle;
    }
}
