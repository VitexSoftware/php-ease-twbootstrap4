<?php
/**
 * Formulář Bootstrapu.
 */

namespace Ease\TWB4;

class Form extends \Ease\Html\Form
{

    /**
     * Vloží prvek do formuláře.
     *
     * @param mixed  $input       Vstupní prvek
     * @param string $caption     Popisek
     * @param string $placeholder předvysvětlující text
     * @param string $helptext    Dodatečná nápověda
     */
    public function addInput($input, $caption = null, $placeholder = null,
                             $helptext = null)
    {
        return $this->addItem(new FormGroup($caption, $input, $placeholder,
                    $helptext));
    }

    /**
     * Vloží další element do formuláře a upraví mu css.
     *
     * @param mixed  $pageItem     hodnota nebo EaseObjekt s metodou draw()
     * @param string $pageItemName Pod tímto jménem je objekt vkládán do stromu
     *
     * @return pointer Odkaz na vložený objekt
     */
    public function &addItem($pageItem, $pageItemName = null)
    {
        if (is_object($pageItem) && method_exists($pageItem, 'setTagClass')) {
            if (strtolower($pageItem->getTagType()) == 'select') {
                $pageItem->setTagClass(trim(str_replace('form_control', '',
                            $pageItem->getTagClass().' form-control')));
            } elseif ($pageItem->getTagProperty('type') == 'file') {
                $pageItem->setTagClass('form-control-file');
            }
        }
        $added = parent::addItem($pageItem, $pageItemName);

        return $added;
    }
}
