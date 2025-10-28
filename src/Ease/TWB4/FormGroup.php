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

class FormGroup extends \Ease\Html\DivTag
{
    /**
     * Položka TWBootstrp formuláře.
     *
     * @param string         $label       popisek pole formuláře
     * @param \Ease\Html\Tag $content     widget formuláře
     * @param string         $placeholder předvysvětlující text
     * @param string         $helptext    Nápvěda pod prvkem
     * @param string         $addTagClass CSS třída kterou má být oskiován vložený prvek
     */
    public function __construct(
        $label = null,
        $content = null,
        $placeholder = null,
        $helptext = null,
        $addTagClass = 'form-control',
    ) {
        if (\is_object($content) && method_exists($content, 'getTagID')) {
            $id = $content->getTagID();
        } else {
            $id = null;
        }

        if (null === $id && !empty($label)) {
            $formKey = \Ease\Functions::lettersOnly($label);
        } else {
            $formKey = $id;
        }

        // Ensure formKey is never null for LabelTag which requires string
        if ($formKey === null) {
            $formKey = 'formgroup_' . uniqid();
        }

        $properties['class'] = 'form-group';
        parent::__construct(null, $properties);
        $this->addItem(new \Ease\Html\LabelTag($formKey, $label));
        $content->addTagClass($addTagClass);

        if ($placeholder) {
            $content->setTagProperties(['placeholder' => $placeholder]);
        }

        $content->setTagId($formKey);
        $this->addItem($content);

        if ($helptext) {
            $this->addItem(new \Ease\Html\PTag(
                $helptext,
                ['class' => 'help-block'],
            ));
        }
    }
}
