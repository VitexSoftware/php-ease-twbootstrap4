<?php
/**
 * Bootstrap4 NavBar.
 */

namespace Ease\TWB4;

class Navbar extends \Ease\Html\NavTag
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
     * @var \Ease\Html\UlTag
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

        parent::__construct([new \Ease\Html\ATag('#', $brand,
                ['class' => 'navbar-brand']), $this->navBarToggler()],
            $properties);
        Part::twBootstrapize();

        $this->leftContent = new \Ease\Html\UlTag(null,
            ['class' => 'navbar-nav mr-auto']);
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

        switch (\Ease\Functions::baseClassName($content)) {
            case 'ATag':
                $content->addTagClass('nav-link');
                if (basename(parse_url($content->getTagProperty('href'),
                            PHP_URL_PATH)) == basename(\Ease\Document::phpSelf())) {
                    $contentClass[] = 'active';
                }

                break;
            case 'Dropdown':
                $contentClass[] = 'dropdown';
                $content->addTagClass('nav-link');
                break;
        }

        $this->leftContent->addItem(new \Ease\Html\LiTag($content,
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
        $this->addMenuItem( new \Ease\TWB4\NavItemDropDown($label, $items) );
    }

    /**
     * Navbar collapse helper
     * 
     * @return \Ease\Html\DivTagnavbar collapse
     */
    public function navbarCollapse()
    {
        return new \Ease\Html\DivTag([$this->leftContent, $this->rightContent],
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
        return new \Ease\Html\ButtonTag(new \Ease\Html\SpanTag(null,
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
