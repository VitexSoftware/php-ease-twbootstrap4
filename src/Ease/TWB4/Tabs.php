<?php

declare(strict_types=1);

/**
 * This file is part of the EaseTWBootstrap4 package
 *
 * https://github.com/VitexSoftware/php-ease-twbootstrap4
 *
 * (c) Vítězslav Dvořák <http://vitexsoftware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ease\TWB4;

use Ease\Html\DivTag;
use Ease\Html\UlTag;

/**
 * @see https://getbootstrap.com/docs/4.3/components/navs/#javascript-behavior
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Tabs extends \Ease\Container
{
    private array $tabs = [];
    private string $activeTab = '';

    /**
     * @param array $tabs
     */
    public function __construct($tabs = [], array $properties = [])
    {
        parent::__construct(null, $properties);
        $this->tabs = $tabs;
    }

    /**
     * Add New Tab.
     *
     * @param string $label
     * @param mixed  $content to render in tab body
     * @param bool   $active  add as active tab
     */
    public function addTab($label, $content, $active = false)
    {
        $this->tabs[$label] = \Ease\Document::embedablize($content);

        if ($active === true) {
            $this->activeTab = $label;
        }

        return $this->tabs[$label];
    }

    /**
     * Convert Tab Name to ID.
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
     * Tabs Handles.
     *
     * @return UlTag
     */
    public function tabHandles()
    {
        $handles = new UlTag(null, ['class' => 'nav nav-tabs']);

        foreach ($this->tabs as $tabName => $tabContent) {
            $id = self::strToID($tabName);

            $properties = [
                'class' => 'nav-link',
                'id' => $id.'-tab',
                'data-toggle' => 'tab',
                'role' => 'tab',
                'aria-controls' => $id,
                'aria-selected' => (string) ($tabName === $this->activeTab)];

            if ($tabName === $this->activeTab) {
                $properties['class'] .= ' active';
            }

            $handles->addItemSmart(new \Ease\Html\ATag(
                '#'.$id,
                $tabName,
                $properties,
            ), ['class' => 'nav-item']);
        }

        return $handles;
    }

    /**
     * Tabs Bodies.
     *
     * @return DivTag
     */
    public function tabBodies()
    {
        $body = new DivTag(null, ['class' => 'tab-content']);

        foreach ($this->tabs as $tabName => $tabContent) {
            $id = self::strToID($tabName);
            $tab = $body->addItem(new DivTag(
                $tabContent,
                ['class' => 'tab-pane fade', 'id' => $id, 'role' => 'tabpanel',
                    'aria-controlledby' => $id.'-tab'],
            ));

            if ($tabName === $this->activeTab) {
                $tab->addTagClass('show active');
            }
        }

        return $body;
    }

    /**
     * Assembling.
     */
    public function finalize(): void
    {
        if (empty($this->activeTab)) {
            $this->activeTab = key($this->tabs);
        }

        $this->addItem($this->tabHandles());
        $this->addItem($this->tabBodies());
        parent::finalize();
    }
}
