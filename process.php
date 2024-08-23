<?php
session_start();

$uploadFileDir = './files/';
$files = scandir($uploadFileDir);
$latestFile = end($files);

if ($latestFile && pathinfo($latestFile, PATHINFO_EXTENSION) === 'txt') {
    $filePath = $uploadFileDir . $latestFile;
    $fileContent = file_get_contents($filePath);

    $delimiter = isset($_SESSION['delimiter']) ? $_SESSION['delimiter'] : PHP_EOL;

    $lines = explode($delimiter, $fileContent);

    echo "<ul>";
    foreach ($lines as $index => $line) {
        $digitsCount = preg_match_all('/\d/', $line);
        echo "<li>Строка " . ($index + 1) . ": " . htmlspecialchars($line) . " — Количество цифр: " . $digitsCount . "</li>";
    }
    echo "</ul>";

    unset($_SESSION['delimiter']);
} else {
    echo "<p>Файл не найден или неверного формата.</p>";
}
