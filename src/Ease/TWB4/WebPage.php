<?php

namespace Ease\TWB4;

/**
 * Stránka TwitterBootstrap4.
 *
 * @author     Vítězslav Dvořák <vitex@hippy.cz>
 * @copyright  2017 Vitex@vitexsoftware.cz (G)
 *
 * @link       http://twitter.github.com/bootstrap/index.html
 */
class WebPage extends \Ease\WebPage
{
    /**
     * Where to look for bootstrap stylesheet
     * @var string path or url 
     */
    public $bootstrapCSS = 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css';

    /**
     * Where to look for bootstrap stylesheet theme
     * @var string path or url 
     */
    public $bootstrapThemeCSS = '';

    /**
     * Where to look for bootstrap stylesheet scripts
     * @var string path or url 
     */
    public $bootstrapJavaScript = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.js';

    /**
     * Stránka s podporou pro twitter bootstrap.
     *
     * @param string   $pageTitle
     */
    public function __construct($pageTitle = null)
    {
        parent::__construct($pageTitle);
        Part::twBootstrapize();

        $this->head->addItem(
            '<meta charset="utf-8">'.
            '<meta name="width=device-width, initial-scale=1, shrink-to-fit=no">'
        );
    }

    /**
     * Vrací zprávy uživatele.
     *
     * @param string $what info|warning|error|success
     *
     * @return string
     */
    public function getStatusMessagesAsHtml($what = null)
    {
        /*
         * Session Singleton Problem hack
         */
        if (!count($this->easeShared->statusMessages)) {
            return '';
        }
        $htmlFargment = '';

        $allMessages = [];
        foreach ($this->easeShared->statusMessages as $quee => $messages) {
            foreach ($messages as $msgID => $message) {
                $allMessages[$msgID][$quee] = $message;
            }
        }
        ksort($allMessages);
        foreach ($allMessages as $messages) {
            $messageType = key($messages);

            if (is_array($what)) {
                if (!in_array($messageType, $what)) {
                    continue;
                }
            }

            foreach ($messages as $message) {
                if (is_object($this->logger)) {
                    if (!isset($this->logger->logStyles[$messageType])) {
                        $messageType = 'notice';
                    }
                    if ($messageType == 'error') {
                        $messageType = 'danger';
                    }
                    $htmlFargment .= '<div class="alert alert-'.$messageType.'" >'.$message.'</div>'."\n";
                } else {
                    $htmlFargment .= '<div class="alert">'.$message.'</div>'."\n";
                }
            }
        }

        return $htmlFargment;
    }
}
