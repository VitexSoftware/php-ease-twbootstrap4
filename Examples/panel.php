<?php

declare(strict_types=1);

/**
 * Example usage of Ease\TWB4\Panel class
 * This demonstrates how to properly use the Panel class from php-ease-twbootstrap4
 * and helps fix "Class CardHeader not found" errors in other projects.
 */

require_once __DIR__ . '/vendor/autoload.php';

use Ease\TWB4\Panel;
use Ease\Html\H3Tag;
use Ease\Html\PTag;
use Ease\Html\ATag;
use Ease\Html\ButtonTag;

echo "<!DOCTYPE html>\n<html>\n<head>\n";
echo "<title>Panel Usage Examples</title>\n";
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css' rel='stylesheet'>\n";
echo "</head>\n<body class='container mt-4'>\n";

// Example 1: Basic Panel with header, body and footer
echo "<h2>Example 1: Basic Panel</h2>\n";
$basicPanel = new Panel(
    'Basic Panel Header',          // heading
    'primary',                     // type (success|warning|info|danger|primary)
    'This is the panel body content.',  // body
    'Panel footer text'            // footer
);
echo $basicPanel->draw();

echo "<hr class='my-4'>\n";

// Example 2: Panel with HTML content
echo "<h2>Example 2: Panel with HTML Content</h2>\n";
$htmlPanel = new Panel();
$htmlPanel->header->addItem(new H3Tag('HTML Content Panel'));
$htmlPanel->body->addItem(new PTag('This panel contains HTML elements.'));
$htmlPanel->body->addItem(new ATag('#', 'This is a link', ['class' => 'btn btn-info']));
$htmlPanel->footer->addItem(new ButtonTag('Action Button', ['class' => 'btn btn-success']));
echo $htmlPanel->draw();

echo "<hr class='my-4'>\n";

// Example 3: Panel with different types/colors
echo "<h2>Example 3: Different Panel Types</h2>\n";

$types = ['success', 'warning', 'info', 'danger'];
foreach ($types as $type) {
    $panel = new Panel(
        ucfirst($type) . ' Panel',
        $type,
        "This is a $type panel with appropriate Bootstrap coloring.",
        "Footer for $type panel"
    );
    echo $panel->draw();
    echo "<br>\n";
}

echo "<hr class='my-4'>\n";

// Example 4: Panel without footer
echo "<h2>Example 4: Panel Without Footer</h2>\n";
$noFooterPanel = new Panel(
    'Panel Without Footer',
    'secondary',
    'This panel has no footer section.',
    null  // null footer means no footer will be displayed
);
echo $noFooterPanel->draw();

echo "<hr class='my-4'>\n";

// Example 5: Adding items programmatically
echo "<h2>Example 5: Adding Items Programmatically</h2>\n";
$programmaticPanel = new Panel('Dynamic Panel');

// Add items to the body
$programmaticPanel->addItem(new PTag('First paragraph added programmatically.'));
$programmaticPanel->addItem(new PTag('Second paragraph with different content.'));
$programmaticPanel->addItem('<p>You can also add raw HTML strings.</p>');

// You can also add to header and footer directly
$programmaticPanel->footer->addItem(new PTag('Footer added after construction.', ['class' => 'text-muted']));

echo $programmaticPanel->draw();

echo "<hr class='my-4'>\n";

// Example 6: Empty panel that gets content conditionally
echo "<h2>Example 6: Conditional Content Panel</h2>\n";
$conditionalPanel = new Panel('Conditional Content');

$hasData = true; // This would come from your application logic

if ($hasData) {
    $conditionalPanel->addItem('<div class="alert alert-success">Data is available!</div>');
    $conditionalPanel->addItem('<p>Here is your data content...</p>');
} else {
    $conditionalPanel->addItem('<div class="alert alert-info">No data available.</div>');
}

echo $conditionalPanel->draw();

echo "\n</body>\n</html>";

/**
 * NOTES FOR FIXING "CardHeader not found" ERROR:
 * 
 * 1. The Panel class does NOT use a separate CardHeader class
 * 2. Instead, it uses DivTag with 'card-header' CSS class
 * 3. Make sure you have the correct namespace: use Ease\TWB4\Panel;
 * 4. Ensure composer autoloader is properly loaded
 * 5. The Panel extends Card, which extends DivTag
 * 
 * Common fixes:
 * - Check if you're trying to use \Ease\TWB4\CardHeader (which doesn't exist)
 * - Use \Ease\TWB4\Panel instead
 * - If you need just a card header, use: new \Ease\Html\DivTag($content, ['class' => 'card-header'])
 * 
 * Proper usage pattern:
 * $panel = new \Ease\TWB4\Panel('Header Text', 'type', 'Body Content', 'Footer');
 * $panel->header->addItem('Additional header content');
 * $panel->body->addItem('Additional body content'); 
 * $panel->footer->addItem('Additional footer content');
 * echo $panel->draw();
 */