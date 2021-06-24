<?php

namespace Ease\Example;

use Ease\Html\ATag;
use Ease\Html\DivTag;
use Ease\Html\H1Tag;
use Ease\Html\H2Tag;
use Ease\Html\H3Tag;
use Ease\Html\SpanTag;
use Ease\Html\StrongTag;
use Ease\TWB4\Alert;
use Ease\TWB4\Badge;
use Ease\TWB4\DropdownButton;
use Ease\TWB4\DropdownLink;
use Ease\TWB4\Navbar;
use Ease\TWB4\Panel;
use Ease\TWB4\PillBadge;
use Ease\TWB4\WebPage;


include_once dirname(__DIR__).'/vendor/autoload.php';

new \Ease\Locale('en_US','','');

$oPage = new WebPage('Twitter Bootstrap 4 Page');

$oPage->addItem(new H1Tag('Twitter Bootstrap 4'));



$navBar = new Navbar('TWB4', 'myNavBar',
    ['class' => 'navbar-expand-lg navbar-light bg-light']);

$navBar->addMenuItem(new ATag('twb4.php',
        ['Home', new SpanTag('(current)', ['class' => 'sr-only'])]));

$navBar->addMenuItem(new ATag('#', 'Link'));
$navBar->addMenuItem(new DropdownLink('Dropdown Link', 'link',
        ['index.php' => _('Main Page'), 'login.php' => _('Login Page')],
        ['class' => 'btn-link']));



$navBar->addMenuItem(new ATag('#', 'Link'), false);

$navBar->addDropDownMenu( _('SubMenu'), ['index.php' => _('Main Page'), 'login.php' => _('Login Page')] );


$oPage->addItem($navBar);

$oPage->addItem(new DropdownButton('Dropdown button', 'link',
        ['index.php' => _('Main Page'), 'login.php' => _('Login Page')],
        ['class' => 'btn-link']));

$oPage->addItem(new H2Tag('Alerts'));


$oPage->addItem(new Alert('success',
        [new StrongTag('Well done!'), 'You successfully read this important alert message.']));
$oPage->addItem(new Alert('info',
        [new StrongTag('Heads up!'), 'This alert needs your attention, but it\'s not super important.']));
$oPage->addItem(new Alert('warning',
        [new StrongTag('Warning!'), 'Better check yourself, you\'re not looking too good.']));
$oPage->addItem(new Alert('danger',
        [new StrongTag('Oh snap!'), 'Change a few things up and try submitting again.']));

$oPage->addItem(new H2Tag('Badge'));

$types = ['default' => 'Default', 'primary' => 'Primary', 'success' => 'Success',
    'info' => 'Info', 'warning' => 'Warning', 'danger' => 'Danger'];

$oPage->addItem(new H3Tag('Simple Badge'));

foreach ($types as $type => $tmsg) {
    $oPage->addItem(new Badge($type, $tmsg));
}

$oPage->addItem(new H3Tag('Pill Badge'));

foreach ($types as $type => $tmsg) {
    $oPage->addItem(new PillBadge($type, $tmsg));
}

$oPage->addItem(new H2Tag('Card: Panel, Well'));

$panel = new Panel( _('Panel Example'), null, _('Example panel body'), _('Example panel footer'));
$panel->addItem(new DivTag(_('Example Panel Row Added')));


$oPage->addItem($panel);

$oPage->draw();
