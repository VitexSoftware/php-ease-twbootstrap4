<?php
// autoload.php for EaseTWB4

require_once '/usr/share/php/EaseHtml/autoload.php';

// Register the autoloader for the EaseTWB4 library
spl_autoload_register(function ($class) {
    // Only autoload classes from the Ease\\TWB4 namespace
    $prefix = 'Ease\\TWB4\\';
    if (strpos($class, $prefix) === 0) {
        $baseDir = __DIR__ . '/';
        $relativeClass = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});
