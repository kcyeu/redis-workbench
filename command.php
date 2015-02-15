<?php

header('Content-type: application/json');

$cmd_path_list = array(
    '/usr/local/bin/redis-cli',
    '/usr/bin/redis-cli'
);

$cmd_found = FALSE;

foreach ($cmd_path_list as $cmd_path)
{
    if (file_exists($cmd_path))
    {
        $redis_cli_cmd = $cmd_path;
        $cmd_found = TRUE;
        break;
    }
}

if ( ! $redis_address = getenv('REDIS_PORT_6379_TCP_ADDR'))
{
    $redis_address = "127.0.0.1";    
}

// Condition checking
if ( ! $cmd_found)
{
    error_log('Command line not found.');
    die (json_encode(array('result' => '', 'code' => '404')));
}

if ($_SERVER["REQUEST_METHOD"] != 'POST')
{
    error_log('Non-POST request');
    die (json_encode(array('result' => '', 'code' => '403')));
}

if ( ! array_key_exists('command', $_POST))
{
    error_log('Mandatory field not found');
    die (json_encode(array('result' => '', 'code' => '403')));
}
//

$command = $_POST["command"];
$command = escapeshellarg($command);

ob_start();
system("echo {$command} | {$redis_cli_cmd} -h {$redis_address}");
$return = ob_get_contents();
ob_end_clean();

exit(json_encode(array('result' => $return, 'code' => '200')));
