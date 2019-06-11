<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ease\TWB4;

use \Ease\Html\DivTag;

/**
 * Description of Panel
 * 
 * @deprecated since version 1.0
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Panel extends Card
{
    /**
     * Hlavička panelu.
     *
     * @var \Ease\Html\DivTag
     */
    public $heading = null;

    /**
     * Tělo panelu.
     *
     * @var \Ease\Html\DivTag
     */
    public $body = null;

    /**
     * Patička panelu.
     *
     * @var \Ease\Html\DivTag
     */
    public $footer = null;

    /**
     * Typ Panelu.
     *
     * @var string succes|wanring|info|danger
     */
    public $type = 'default';

    /**
     * Panel Twitter Bootstrapu.
     *
     * @param string|mixed $heading
     * @param string       $type    succes|wanring|info|danger
     * @param mixes        $body    tělo panelu
     * @param mixed        $footer  patička panelu. FALSE = nezobrazit vůbec
     */
    public function __construct($heading = null, $type = 'default',
                                $body = null, $footer = null)
    {
        parent::__construct();
        $this->heading = new DivTag($heading, ['style' => 'card-header']);
        $this->body    = new DivTag($body, ['style' => 'card-body']);
        $this->footer  = new DivTag($footer, ['style' => 'card-footer']);
    }

    /**
     * Vloží další element do objektu.
     *
     * @param mixed  $pageItem     hodnota nebo EaseObjekt s metodou draw()
     * @param string $pageItemName Pod tímto jménem je objekt vkládán do stromu
     *
     * @return pointer Odkaz na vložený objekt
     */
    public function &addItem($pageItem, $pageItemName = null)
    {
        $added = $this->body->addItem($pageItem, $pageItemName);

        return $added;
    }

    public function finalize()
    {
        if ($this->header->getItemCount()) {
            $this->addItem($this->header);
        }
        if ($this->body->getItemCount()) {
            $this->addItem($this->body);
        }
        if ($this->footer->getItemCount()) {
            $this->addItem($this->footer);
        }
    }
}
    