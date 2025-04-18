<?php


function get_dbc_repository()
{
    $file = __DIR__ . '/../../../config.json';

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
