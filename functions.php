<?php
function includeTemplate(string $path, array $data = []): string
{
    if (!file_exists($path)) {
    return '';
    }
    ob_start();

    require_once $path;

    return ob_get_clean();
}
?>