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
class DropdownLink extends \Ease\Html\DivTag
{
    /**
     *
     * @var \Ease\Html\DivTag 
     */
    private $dropdownMenu = null;

    /**
     * Dropdown menu
     * 
     * @param string $heading
     * @param string $type       one of primary|secondary|success|danger|warning|info|light|dark|link
     * @param array  $items
     * @param array  $properties
     */
    public function __construct($heading, $type = 'link', $items = [],
                                $properties = array())
    {
        $properties['class'] = 'dropdown';
        $handle = $this->handle($heading, $type);
        parent::__construct($handle, $properties);

        $this->dropdownMenu = new \Ease\Html\DivTag(null,
            ['class' => 'dropdown-menu', 'aria-labelledby' => $handle->getTagID()]);

        if (!empty($items)) {
            foreach ($items as $url => $label) {
                $this->addDropdownItem($label, $url);
            }
        }
    }

    /**
     * Dropdown handle
     * 
     * @param string $heading
     * @param string $type       one of primary|secondary|success|danger|warning|info|light|dark|link
     * 
     * @return \Ease\Html\ATag
     */
    public function handle($heading, $type)
    {
        $handle = new \Ease\Html\ATag('#',$heading,
            ['class' => 'nav-link '.$type.' dropdown-toggle', 'type' => 'button',
            'data-toggle' => 'dropdown', 'role'=>'button', 'aria-haspopup' => 'true', 'aria-expanded' => 'false']);
        $handle->setTagID($heading);
        return $handle;
    }

    /**
     * add one dropdown item
     * 
     * @param string $label or empty for divider
     * @param string $url
     */
    public function addDropdownItem($label, $url)
    {
        if(empty($label)){
            $this->dropdownMenu->addItem(new \Ease\Html\DivTag(null,['class'=>'dropdown-divider']));
        } else {
            $this->dropdownMenu->addItem(new \Ease\Html\ATag($url, $label,
                ['class' => 'dropdown-item']));
        } 
    }

    public
        function finalize()
    {
        $this->addItem($this->dropdownMenu);
    }
}
