<?php
// config.php - Loads .env variables
function loadEnv($path = __DIR__) {
    $envFile = $path . '/.env';
    if (!file_exists($envFile)) {
        throw new Exception('.env file not found!');
    }

    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; // Skip comments

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        putenv("$name=$value"); // Store in environment
    }
}

loadEnv(); // Call it once when your app starts
?>