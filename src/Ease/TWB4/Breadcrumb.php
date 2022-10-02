<?php

namespace Ease\TWB4;

/**
 * Bootstrap's Breadcrumb
 */
class Breadcrumb extends \Ease\Html\NavTag {

    /**
     * 
     * @var \Ease\Html\OlTag
     */
    public $ol;

    /**
     * Bootstrap's Breadcrumb
     *
     * @link https://getbootstrap.com/docs/4.0/components/breadcrumb/
     *
     * @param mixed $content     to insert in
     * @param array $properties  additional
     */
    public function __construct($content = null, $properties = []) {
        $properties['aria-label'] = 'breadcrumb';
        parent::__construct($content, $properties);
        $this->ol = parent::addItem(new \Ease\Html\OlTag($content, ['class' => 'breadcrumb']));
    }

    /**
     * Add item into Breadcrumb
     * 
     * @param mixed $pageItem
     * 
     * @return mixed
     */
    public function addItem($pageItem) {
        return $this->ol->addItem($pageItem);
    }

    /**
     * Add Page into Breadcrumb
     * 
     * @param string $name
     * @param string $url
     * 
     * @return \Ease\Html\LiTag
     */
    public function addPage($name, $url) {
        return $this->addItem(new \Ease\Html\LiTag(new \Ease\Html\ATag($url, $name), ['class' => 'breadcrumb-item']));
    }

    /**
     * Add Current Page into Breadcrumb
     * 
     * @param string $name
     * 
     * @return \Ease\Html\LiTag
     */
    public function addCurrentPage($name) {
        return $this->addItem(new \Ease\Html\LiTag($name, ['class' => 'breadcrumb-item active', 'aria-current' => 'page']));
    }

}
