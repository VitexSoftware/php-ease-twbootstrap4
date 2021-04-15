<?php
/**
 * Twitter Bootrstap Row.
 *
 * @author    Vitex <vitex@hippy.cz>
 * @copyright 2009-2021 Vitex@hippy.cz (G)
 */

namespace Ease\TWB4;

class Row extends \Ease\Html\DivTag
{

    /**
     * Twitter Bootrstap Row.
     *
     * @param mixed $content Prvotní obsah
     * @param array $properties Of Row Div 
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct($content,  $properties);
        $this->addTagClass('row');
    }

    /**
     * Vloží do řádku políčko.
     * Add Column into Row.
     *
     * @link   http://getbootstrap.com/css/#grid
     *
     * @param int    $size       Velikost políčka 1 - 12
     * @param mixed  $content    Obsah políčka
     * @param string $target     Typ zařízení xs|sm|md|lg
     * @param array  $properties Další vlastnosti tagu
     *
     * @return Col Column contains $content
     */
    public function &addColumn($size, $content = null, $target = 'md',
                               $properties = [])
    {
        $added = $this->addItem(new Col($size, $content, $target, $properties));

        return $added;
    }
}
