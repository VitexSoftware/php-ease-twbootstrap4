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

/**
 * Description of Modal
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Modal extends \Ease\Html\DivTag
{
    /**
     * Modal Title.
     *
     * @var \Ease\Html\H5Tag
     */
    public $header;

    /**
     * Modal Body.
     *
     * @var DivTag
     */
    public $body;

    /**
     * Modal Footer.
     *
     * @var DivTag
     */
    public $footer;

    /**
     * Modal dialog.
     *
     * @var DivTag
     */
    public $dialog;

    /**
     * Modal content.
     *
     * @var DivTag
     */
    public $content;

    /**
     * Twitter Bootstrap Modal dialog.
     *
     * @param string|mixed $title
     * @param mixed        $body
     * @param mixed        $footer
     * @param array        $properties
     */
    public function __construct($title, $body = null, $footer = null, $properties = [])
    {
        if (array_key_exists('id', $properties) === false) {
            $properties['id'] = 'ease-modal-' . rand();
        }
        $this->header = new ModalHeader(new \Ease\Html\H5Tag(new \Ease\Html\StrongTag($title), ['class' => 'modal-title']));
        $this->body = new ModalBody($body);
        $this->footer = new ModalFooter($footer);
        $this->content = new DivTag([
            new DivTag([
                $this->header,
                new \Ease\Html\ButtonTag(
                    new \Ease\Html\SpanTag('&times;', ['aria-hidden' => 'true']),
                    ['type' => 'button', 'class' => 'close', 'data-dismiss' => 'modal', 'aria-label' => 'Close']
                )
                    ], ['class' => 'modal-header']),
            $this->body,
            $this->footer
                ], ['class' => 'modal-content']);
        $this->dialog = new DivTag($this->content, ['class' => 'modal-dialog', 'role' => 'document']);
        $properties['role'] = 'dialog';
        parent::__construct($this->dialog, $properties);
        $this->addTagClass('modal fade');
    }

    /**
     * Add JavaScript to show the modal.
     */
    public function show()
    {
        WebPage::singleton()->addJavaScript("$('#" . $this->getTagID() . "').modal('show')");
    }
}
