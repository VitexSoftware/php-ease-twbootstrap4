<?php

namespace Ease\Example;

use Ease\Locale;
use Ease\TWB4\WebPage;

include_once dirname(__DIR__) . '/vendor/autoload.php';

new Locale('en_US', '', '');

$oPage = new WebPage('Twitter Bootstrap 4 Pricing Page');

$oPage->addCss('
html {
  font-size: 14px;
}
@media (min-width: 768px) {
  html {
    font-size: 16px;
  }
}

.container {
  max-width: 960px;
}

.pricing-header {
  max-width: 700px;
}

.card-deck .card {
  min-width: 220px;
}

.border-top { border-top: 1px solid #e5e5e5; }
.border-bottom { border-bottom: 1px solid #e5e5e5; }

.box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
');

$topMenu = new \Ease\Html\DivTag(new \Ease\Html\H5Tag('Company name', ['class' => 'my-0 mr-md-auto font-weight-normal']), ['class' => 'd-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow']);

$topMenuNav = new \Ease\Html\NavTag(null, ['class' => 'my-2 my-md-0 mr-md-3']);
$topMenuNav->addItem(new \Ease\Html\ATag('#', 'Features', ['class' => 'p-2 text-dark']));
$topMenuNav->addItem(new \Ease\Html\ATag('#', 'Enterprise', ['class' => 'p-2 text-dark']));
$topMenuNav->addItem(new \Ease\Html\ATag('#', 'Support', ['class' => 'p-2 text-dark']));
$topMenuNav->addItem(new \Ease\Html\ATag('#', 'Pricing', ['class' => 'p-2 text-dark']));

$topMenu->addItem($topMenuNav);
$topMenu->addItem(new \Ease\Html\ATag('#', 'Sign up', ['class' => 'btn btn-outline-primary']));

$oPage->addItem($topMenu);

$pricingHeader = new \Ease\Html\DivTag(new \Ease\Html\H1Tag('Pricing', ['class' => 'display-4']));
$pricingHeader->addItem(new \Ease\Html\PTag("Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.", ['class' => 'lead']));

$oPage->addItem($pricingHeader);

$container = $oPage->addItem(new \Ease\TWB4\Container());

$cardDeck = new \Ease\Html\DivTag(null, ['class' => 'card-deck mb-3 text-center']);

$freeCard = new \Ease\TWB4\Panel('Free', 'inverse', new \Ease\Html\H1Tag(['$0', new \Ease\Html\SmallTag('/ mo', ['class' => 'text-muted']) ], ['class' => 'card-title pricing-card-title']));
$freeFeature = new \Ease\Html\UlTag(null, ['style' => 'list-unstyled mt-3 mb-4']);
$freeFeature->addItemSmart('10 users included');
$freeFeature->addItemSmart('2 GB of storage');
$freeFeature->addItemSmart('Email support');
$freeFeature->addItemSmart('Help center access');

$freeCard->addItem($freeFeature);
$freeCard->addItem(new \Ease\Html\ButtonTag('Sign up for free', ['type' => 'button','class' => 'btn btn-lg btn-block btn-outline-primary']));


$proCard = new \Ease\TWB4\Panel('Pro', 'inverse', new \Ease\Html\H1Tag(['$15', new \Ease\Html\SmallTag('/ mo', ['class' => 'text-muted']) ], ['class' => 'card-title pricing-card-title']));
$proFeature = new \Ease\Html\UlTag(null, ['style' => 'list-unstyled mt-3 mb-4']);
$proFeature->addItemSmart('20 users included');
$proFeature->addItemSmart('10 GB of storage');
$proFeature->addItemSmart('Phone and email support');
$proFeature->addItemSmart('Help center access');

$proCard->addItem($proFeature);
$proCard->addItem(new \Ease\Html\ButtonTag('Get started', ['type' => 'button','class' => 'btn btn-lg btn-block btn-primary']));


$enterpriseCard = new \Ease\TWB4\Panel('Enterprise', 'inverse', new \Ease\Html\H1Tag(['$29', new \Ease\Html\SmallTag('/ mo', ['class' => 'text-muted']) ], ['class' => 'card-title pricing-card-title']));
$enterpriseFeature = new \Ease\Html\UlTag(null, ['style' => 'list-unstyled mt-3 mb-4']);
$enterpriseFeature->addItemSmart('30 users included');
$enterpriseFeature->addItemSmart('15 GB of storage');
$enterpriseFeature->addItemSmart('Phone and email support');
$enterpriseFeature->addItemSmart('Help center access');

$enterpriseCard->addItem($enterpriseFeature);
$enterpriseCard->addItem(new \Ease\Html\ButtonTag('Contact us', ['type' => 'button','class' => 'btn btn-lg btn-block btn-primary']));



$cardDeck->addItems([$freeCard, $proCard, $enterpriseCard]);

$container->addItem($cardDeck);

$footerRow = new \Ease\TWB4\Row();
$footTop = $footerRow->addColumn(12, new \Ease\Html\ImgTag('https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg', '', ['class' => 'mb-2', 'width' => 24, 'height' => 24]));
$footTop->addItem(new \Ease\Html\SmallTag('&copy; 2017-2018', ['classs' => 'd-block mb-3 text-muted']));

$featuresColumn = $footerRow->addColumn(6, new \Ease\Html\H5Tag('Features'));
$features = new \Ease\Html\UlTag(null, ['class' => 'list-unstyled text-small']);
$features->addItemSmart(new \Ease\Html\ATag('#', 'Cool stuff', ['class' => 'text-muted']));
$features->addItemSmart(new \Ease\Html\ATag('#', 'Random feature', ['class' => 'text-muted']));
$features->addItemSmart(new \Ease\Html\ATag('#', 'Team feature', ['class' => 'text-muted']));
$features->addItemSmart(new \Ease\Html\ATag('#', 'Stuff for developers', ['class' => 'text-muted']));
$features->addItemSmart(new \Ease\Html\ATag('#', 'Another one', ['class' => 'text-muted']));
$features->addItemSmart(new \Ease\Html\ATag('#', 'Last time', ['class' => 'text-muted']));
$featuresColumn->addItem($features);

$resourcesColumn = $footerRow->addColumn(6, new \Ease\Html\H5Tag('Resources'));
$resources = new \Ease\Html\UlTag(null, ['class' => 'list-unstyled text-small']);
$resources->addItemSmart(new \Ease\Html\ATag('#', 'Resource', ['class' => 'text-muted']));
$resources->addItemSmart(new \Ease\Html\ATag('#', 'Resource name', ['class' => 'text-muted']));
$resources->addItemSmart(new \Ease\Html\ATag('#', 'Another resource', ['class' => 'text-muted']));
$resources->addItemSmart(new \Ease\Html\ATag('#', 'Final resource', ['class' => 'text-muted']));
$resourcesColumn->addItem($resources);

$aboutColumn = $footerRow->addColumn(6, new \Ease\Html\H5Tag('About'));
$about = new \Ease\Html\UlTag(null, ['class' => 'list-unstyled text-small']);
$about->addItemSmart(new \Ease\Html\ATag('#', 'Team', ['class' => 'text-muted']));
$about->addItemSmart(new \Ease\Html\ATag('#', 'Locations', ['class' => 'text-muted']));
$about->addItemSmart(new \Ease\Html\ATag('#', 'Privacy', ['class' => 'text-muted']));
$about->addItemSmart(new \Ease\Html\ATag('#', 'Terms', ['class' => 'text-muted']));
$aboutColumn->addItem($about);

$footer = new \Ease\Html\FooterTag($footerRow, ['class' => 'pt-4 my-md-5 pt-md-5 border-top']);

$container->addItem($footer);

$oPage->draw();
