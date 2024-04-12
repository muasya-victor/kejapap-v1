<?php
// Check if the tcpdf directory exists in the same directory as this file
$tcpdfDir = __DIR__ . '/tcpdf';
if (is_dir($tcpdfDir)) {
    echo "The path to the tcpdf directory is: " . $tcpdfDir;
} else {
    echo "The tcpdf directory was not found in the same directory as this file.";
}
?>