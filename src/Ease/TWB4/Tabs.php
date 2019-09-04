<?php

namespace Ease\TWB4;

use Ease\Html\DivTag;
use Ease\Html\LiTag;
use Ease\Html\UlTag;

/**
 * @see https://getbootstrap.com/docs/4.3/components/navs/#javascript-behavior
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Tabs extends UlTag
{
    /**
     *
     * @var array 
     */
    private $tabs = [];

    /**
     *
     * @var string 
     */
    private $activeTab = '';

    /**
     * 
     * @param type $tabs
     * @param type $properties
     */
    public function __construct($tabs = [], $properties = array())
    {
        parent::__construct(null, $properties);
        $this->addTagClass('nav nav-tabs');
    }

    /**
     * Add New Tab
     * 
     * @param string  $label
     * @param mixed   $content to render in tab body
     * @param boolean $active add as active tab
     */
    public function addTab($label, $content, $active = false)
    {
        $this->tabs[$label] = $content;
        if ($active === true) {
            $this->activeTab = $label;
        }
    }

    /**
     * Convert Tab Name to ID
     * 
     * @param string $tabLabel 
     * 
     * @return string
     */
    public static function strToID($tabLabel)
    {
        return preg_replace('/[^A-Za-z0-9_\\-]/', '', $tabLabel);
    }

    /**
     * Tabs Handles
     * 
     * @return array
     */
    public function tabHandles()
    {
        $handles = [];
        foreach ($this->tabs as $tabName => $tabContent) {
            $id           = self::strToID($tabName);
            $handles[$id] = new LiTag(null, ['class' => 'nav-item']);
            $tab          = $handles[$id]->addItem(new DivTag($tabContent,
                    ['class' => 'nav-link', 'id' => $id.'-tab', 'data-toggle' => 'tab',
                    'href' => '#'.$id, 'aria-controls' => $id, 'aria-selected' => strval($tabName
                        == $this->activeTab)]));
            if ($tabName == $this->activeTab) {
                $tab->addTagClass('active');
            }
        }
        return $handles;
    }

    /**
     * Tabs Bodies
     * 
     * @return DivTag
     */
    public function tabBodies()
    {
        $body = new DivTag(null, ['class' => 'tab-content']);
        foreach ($this->tabs as $tabName => $tabContent) {
            $id  = self::strToID($tabName);
            $tab = $body->addItem(new DivTag($tabContent,
                    ['class' => 'tab-pane fade', 'id' => $id, 'role' => 'tabpanel',
                    'aria-controlledby' => $id.'-tab']));
            if ($tabName == $this->activeTab) {
                $tab->addTagClass('show active');
            }
        }
        return $body;
    }

    /**
     * 
     */
    public function finalize()
    {
        if(empty($this->activeTab)){
            $this->activeTab = key($this->tabs);
        }
            
        $this->addItem($this->tabHandles());
        $this->addItem($this->tabBodies());
        parent::finalize();
    }
}
