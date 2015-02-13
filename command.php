<?php

require_once __DIR__ . '/error_reporting.php';

header('Content-type: application/json');

if ($_SERVER["REQUEST_METHOD"] != 'POST')
{
    die (json_encode(ErrorReporting::get_error_message(403,"Non-POST request")));
}

if ( ! array_key_exists('command', $_POST))
{
    die (json_encode(ErrorReporting::get_error_message(403, "Mandatory field not found")));
}

$command = $_POST["command"];
$command = escapeshellarg($command);

ob_start();
system("echo {$command} | redis-cli");
$return = ob_get_contents();
ob_end_clean();

exit(json_encode(array('result' => $return)));
