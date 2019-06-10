<?php
/**
 * Twitter Bootstrap4 common class.
 *
 * @author Vitex <vitex@hippy.cz>
 */

namespace Ease\TWB4;

class Part extends \Ease\Part
{

    /**
     * Vložení náležitostí pro twitter bootstrap.
     */
    public function __construct()
    {
        parent::__construct();
        self::twBootstrapize();
    }

    /**
     * Opatří objekt vším potřebným pro funkci bootstrapu.
     */
    public static function twBootstrapize()
    {
        parent::jQueryze();
        $webPage = \Ease\Shared::webPage();
        $webPage->includeCSS($webPage->bootstrapCSS);
        $webPage->includeJavaScript($webPage->bootstrapJavaScript);
        return true;
    }
}
