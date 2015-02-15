<?php

require_once __DIR__ . '/error_reporting.php';

define('REDIS_CLI_CMD', '/usr/local/bin/redis-cli');
$redis_cli_cmd = REDIS_CLI_CMD;

if ( ! $redis_address = getenv('REDIS_PORT_6379_TCP_ADDR'))
{
    $redis_address = "127.0.0.1";    
}

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
system("echo {$command} | {$redis_cli_cmd}");
$return = ob_get_contents();
ob_end_clean();

exit(json_encode(array('result' => $return)));
