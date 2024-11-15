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
 * Stránka TwitterBootstrap4.
 *
 * @author     Vítězslav Dvořák <vitex@hippy.cz>
 * @copyright  2017 Vitex@vitexsoftware.cz (G)
 *
 * @see       http://twitter.github.com/bootstrap/index.html
 */
class WebPage extends \Ease\WebPage
{
    /**
     * Where to look for bootstrap stylesheet.
     *
     * @var string path or url
     */
    public string $bootstrapCSS = 'https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/css/bootstrap.min.css';

    /**
     * Where to look for bootstrap stylesheet theme.
     *
     * @var string path or url
     */
    public string $bootstrapThemeCSS = '';

    /**
     * Where to look for bootstrap stylesheet scripts.
     *
     * @var string path or url
     */
    public string $bootstrapJavaScript = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/js/bootstrap.bundle.js';
    public \Ease\Html\HeaderTag $header;
    public \Ease\Html\MainTag $main;
    public \Ease\Html\FooterTag $footer;

    /**
     * Page with support for twitter bootstrap.
     */
    public function __construct(string $pageTitle = '')
    {
        parent::__construct($pageTitle);
        Part::twBootstrapize();

        $this->head->addItem(
            '<meta charset="utf-8">'.
                '<meta name="viewport" content="width=device-width, initial-scale=1">',
        );
    }

    public function addToHeader($content)
    {
        if (null === $this->header) {
            $this->header = new \Ease\Html\HeaderTag();
        }

        return $this->header->addItem($content);
    }

    public function addToMain($content)
    {
        if (null === $this->main) {
            $this->main = new \Ease\Html\MainTag();
        }

        return $this->main->addItem($content);
    }

    public function addToFooter($content)
    {
        if (null === $this->footer) {
            $this->footer = new \Ease\Html\FooterTag();
        }

        return $this->footer->addItem($content);
    }

    public function finalize(): void
    {
        if ((null === $this->header) === false) {
            $this->addAsFirst($this->header);
        }

        if ((null === $this->main) === false) {
            $this->addItem($this->main);
        }

        if ((null === $this->footer) === false) {
            $this->addItem($this->footer);
        }

        parent::finalize();
    }
}
