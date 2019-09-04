<?php

namespace Ease\TWB4;

use Ease\Document;
use Ease\Functions;
use Ease\Html\ATag;
use Ease\Html\ButtonTag;
use Ease\Html\DivTag;
use Ease\Html\LiTag;
use Ease\Html\NavTag;
use Ease\Html\SpanTag;
use Ease\Html\UlTag;
use Ease\TWB4\NavItemDropDown;
use Ease\TWB4\Part;

/**
 * Bootstrap4 NavBar.
 */
class Navbar extends NavTag
{
    /**
     * Vnitřek menu.
     *
     * @var array
     */
    public $leftContent = null;

    /**
     *
     * @var string
     */
    private $navBarName = 'nav';

    /**
     * Položky menu přidávané vpravo.
     *
     * @var UlTag
     */
    private $rightContent = null;

    /**
     * Menu aplikace.
     *
     * @param string $brand
     * @param string $name
     * @param array  $properties
     */
    public function __construct($brand = null, $name = 'navbar',
                                $properties = [])
    {
        if (is_array($properties) && array_key_exists('class', $properties)) {
            $originalClass = $properties['class'];
        } else {
            $originalClass = '';
        }

        $properties['class'] = trim('navbar '.$originalClass);
        $this->navBarName    = $name;

        parent::__construct([new ATag('#', $brand, ['class' => 'navbar-brand']),
            $this->navBarToggler()], $properties);
        Part::twBootstrapize();

        $this->leftContent = new UlTag(null, ['class' => 'navbar-nav mr-auto']);
    }

    /**
     * 
     * @param type $content
     * @param type $enabled
     */
    public function addMenuItem($content, $enabled = true)
    {
        $contentClass[] = 'nav-item';
        if ($enabled === false) {
            $content->setTagProperties(['aria-disabled' => 'true', 'tabindex' => '-1']);
            $content->addTagClass('disabled');
        }

        switch (Functions::baseClassName($content)) {
            case 'ATag':
                $content->addTagClass('nav-link');
                if (basename(parse_url($content->getTagProperty('href'),
                            PHP_URL_PATH)) == basename(Document::phpSelf())) {
                    $contentClass[] = 'active';
                }

                break;
            case 'Dropdown':
                $contentClass[] = 'dropdown';
                $content->addTagClass('nav-link');
                break;
        }

        $this->leftContent->addItem(new LiTag($content,
                ['class' => implode(' ', $contentClass)]));
    }

    /**
     * Add Dropdown menu to nav
     * 
     * @param string $label submenu label
     * @param array  $items ['url'=>'label','url2'=>'label2','divider1'=>'',...]
     */
    public function addDropDownMenu($label, $items)
    {
        $this->addMenuItem(new NavItemDropDown($label, $items));
    }

    /**
     * Navbar collapse helper
     * 
     * @return \Ease\Html\DivTagnavbar collapse
     */
    public function navbarCollapse()
    {
        return new DivTag([$this->leftContent, $this->rightContent],
            ['class' => 'collapse navbar-collapse', 'id' => $this->navBarName.'SupportedContent']);
    }

    /**
     * 
     */
    public function finalize()
    {
        $this->addItem($this->navbarCollapse());
        parent::finalize();
    }

    public function navBarToggler()
    {
        return new ButtonTag(new SpanTag(null,
                ['class' => 'navbar-toggler-icon']),
            [
            'class' => 'navbar-toggler',
            'type' => 'button',
            'data-toggle' => 'collapse',
            'data-target' => '#'.$this->navBarName.'SupportedContent',
            'aria-controls' => $this->navBarName.'SupportedContent',
            'aria-expanded' => 'false',
            'aria-label' => _('Toggle navigation')]);
    }
}
