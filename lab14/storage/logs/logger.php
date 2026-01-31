<?php
function log_error($msg) {
    $line = date('Y-m-d H:i:s') . " | " . $msg . PHP_EOL;
    file_put_contents(__DIR__ . '/app.log', $line, FILE_APPEND);
}
