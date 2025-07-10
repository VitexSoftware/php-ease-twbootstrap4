<?php

require_once '../vendor/autoload.php';

use Ease\Html\ATag;
use Ease\TWB4\SplitDropdownButton;
use Ease\TWB4\WebPage;

include_once dirname(__DIR__).'/vendor/autoload.php';

$oPage = new WebPage('Twitter Bootstrap 4 Tabs Example');

$items = [
    '#action' =>  new ATag('action.php', 'Action'),
    '#another' => 'Another action',
    '#something' => 'Something else here',
    ''  => '', // Divider
    '#separated' => 'Separated link',
];

$splitButton = new SplitDropdownButton( new ATag('example.php','Example'), 'danger', $items);

$oPage->addItem($splitButton);

$oPage->draw();
