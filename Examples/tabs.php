<?php

namespace Ease\Example;

use Ease\TWB4\Tabs;
use Ease\TWB4\WebPage;

include_once dirname(__DIR__).'/vendor/autoload.php';

$oPage = new WebPage('Twitter Bootstrap 4 Tabs Example');

$tabs = ['Home' => 'Home Tab Content', 'Profile' => 'Profile Tab Content', 'Contact' => 'Contact Tab contents'];

$tabsAdded = $oPage->addItem(new Tabs($tabs, ['id' => 'myTab']));

$tabsAdded->addTab('Another', 'another tab contents');

$oPage->draw();
