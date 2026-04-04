<?php
/**
 * KFT Setup Script - Run after upload to InfinityFree
 * Upload this file to your server root and access it via browser
 * Example: https://kft.xo.je/setup.php
 */

echo "<h1>KFT Setup</h1>";

// Create necessary directories
$dirs = [
    'storage/framework/cache',
    'storage/framework/sessions', 
    'storage/framework/views',
    'storage/logs',
    'bootstrap/cache'
];

echo "<h2>Creating directories...</h2>";
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        if (mkdir($dir, 0755, true)) {
            echo "<p>✓ Created: $dir</p>";
        } else {
            echo "<p>✗ Failed: $dir</p>";
        }
    } else {
        echo "<p>✓ Exists: $dir</p>";
    }
}

echo "<h2>Setting permissions...</h2>";
$permDirs = ['storage', 'bootstrap/cache'];
foreach ($permDirs as $dir) {
    if (is_dir($dir)) {
        chmod($dir, 0755);
        echo "<p>✓ Permissions set: $dir</p>";
    }
}

echo "<h2>Checking .env...</h2>";
if (file_exists('.env')) {
    echo "<p>✓ .env exists</p>";
} else {
    echo "<p>✗ .env NOT FOUND - Please upload .env file</p>";
}

echo "<h2>Checking PHP version...</h2>";
echo "<p>PHP Version: " . phpversion() . "</p>";

echo "<h2>Setup Complete!</h2>";
echo "<p>Now try accessing your site.</p>";
echo "<p><a href='/'>Go to Home</a></p>";
