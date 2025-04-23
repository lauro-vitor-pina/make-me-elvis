<?php


function get_dbc_repository()
{
    $file_name = is_local_environment() ? 'config.dev.json' :  'config.prd.json';

    $file = __DIR__ . '/../../../' . $file_name;

    if (!file_exists($file)) {
        die("Arquivo de configuração '$file' não encontrado.");
    }

    $contents = file_get_contents($file);

    $result_config = json_decode($contents, false);

    $connection_database =  $result_config->connection_database;

    $dbc = mysqli_connect(
        $connection_database->hostname,
        $connection_database->username,
        $connection_database->password,
        $connection_database->database,
        $connection_database->port
    )  or die('Faild to connect MySQL Server.');

    return $dbc;
}

function close_dbc_repository($dbc)
{
    mysqli_close($dbc);
}

function is_local_environment()
{
    $host = $_SERVER['SERVER_NAME'] ?? '';

    return in_array($host, ['localhost', '127.0.0.1']);
}
