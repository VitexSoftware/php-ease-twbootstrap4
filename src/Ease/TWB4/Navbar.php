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

use Ease\Document;
use Ease\Functions;
use Ease\Html\ATag;
use Ease\Html\ButtonTag;
use Ease\Html\DivTag;
use Ease\Html\LiTag;
use Ease\Html\NavTag;
use Ease\Html\SpanTag;
use Ease\Html\UlTag;

/**
 * Bootstrap4 NavBar.
 */
class Navbar extends NavTag
{
    /**
     * Vnitřek menu.
     */
    public UlTag $leftContent;

    /**
     * Položky menu přidávané vpravo.
     */
    public UlTag $rightContent;

    /**
     * Brand link destination.
     */
    public string $mainpage = '#';
    private string $navBarName = 'nav';

    /**
     * NavBar.
     *
     * @param string $brand
     * @param string $name
     */
    public function __construct(
        $brand = null,
        $name = 'navbar',
        array $properties = []
    ) {
        if (\is_array($properties) && \array_key_exists('class', $properties)) {
            $originalClass = $properties['class'];
        } else {
            $originalClass = '';
        }

        $properties['class'] = trim('navbar '.$originalClass);
        $this->navBarName = $name;

        parent::__construct([new ATag($this->mainpage, $brand, ['class' => 'navbar-brand']),
            $this->navBarToggler()], $properties);
        Part::twBootstrapize();

        $this->leftContent = new UlTag(null, ['class' => 'navbar-nav mr-auto']);
        $this->rightContent = new UlTag(null, ['class' => 'navbar-nav ml-auto']);
    }

    /**
     * Add new Menu Item into navbar.
     *
     * @param mixed  $content   to insert in menu
     * @param bool   $enabled   false give you gray nonclickable menu item
     * @param string $placement "left" is default
     *
     * @return LiTag MenuItem added
     */
    public function addMenuItem($content, $enabled = true, $placement = 'left')
    {
        $contentClass[] = 'nav-item';

        if ($enabled === false) {
            $content->setTagProperties(['aria-disabled' => 'true', 'tabindex' => '-1']);
            $content->addTagClass('disabled');
        }

        switch (Functions::baseClassName($content)) {
            case 'ATag':
                $content->addTagClass('nav-link');

                if (
                    !empty($content->getTagProperty('href')) && basename(parse_url(
                        $content->getTagProperty('href'),
                        \PHP_URL_PATH,
                    )) === basename(Document::phpSelf())
                ) {
                    $contentClass[] = 'active';
                }

                break;
            case 'Dropdown':
                $contentClass[] = 'dropdown';
                $content->addTagClass('nav-link');

                break;
        }

        $menuItem = new LiTag($content, ['class' => implode(' ', $contentClass)]);

        return $placement === 'left' ? $this->leftContent->addItem($menuItem) : $this->rightContent->addItem($menuItem);
    }

    /**
     * Add Dropdown menu to nav.
     *
     * @param string $label     submenu label
     * @param array  $items     ['url'=>'label','url2'=>'label2','divider1'=>'',...]
     * @param string $placement "left" is default
     *
     * @return NavItemDropDown
     */
    public function addDropDownMenu($label, $items, $placement = 'left')
    {
        return $this->addMenuItem(new NavItemDropDown($label, $items), true, $placement);
    }

    /**
     * Navbar collapse helper.
     *
     * @return \Ease\Html\DivTagnavbar collapse
     */
    public function navbarCollapse()
    {
        return new DivTag(
            [$this->leftContent, $this->rightContent],
            ['class' => 'collapse navbar-collapse', 'id' => $this->navBarName.'SupportedContent'],
        );
    }

    public function finalize(): void
    {
        $this->addItem($this->navbarCollapse());
        parent::finalize();
    }

    public function navBarToggler()
    {
        return new ButtonTag(
            new SpanTag(
                null,
                ['class' => 'navbar-toggler-icon'],
            ),
            [
                'class' => 'navbar-toggler',
                'type' => 'button',
                'data-toggle' => 'collapse',
                'data-target' => '#'.$this->navBarName.'SupportedContent',
                'aria-controls' => $this->navBarName.'SupportedContent',
                'aria-expanded' => 'false',
                'aria-label' => _('Toggle navigation')],
        );
    }
}
