<?php

namespace Ease\Example\TWB4;

include_once dirname(__DIR__) . '/vendor/autoload.php';

$webPage = new \Ease\TWB4\WebPage('Ease TWB4 Modal example');

$modal = new \Ease\TWB4\Modal(
    'Modal title',
    'Modal body',
    new \Ease\TWB4\LinkButton('https://vitexsoftware.cz/', 'VitexSoftware', 'success')
);

$toggler = new \Ease\TWB4\ModalToggleButton('Launch demo modal', $modal);

$webPage->addItem($toggler);
$webPage->addItem($modal);

$webPage->draw();
