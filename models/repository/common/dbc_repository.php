<?php

require_once( __DIR__ . '/config_repository.php');

function dbc_repository_get_connection()
{
    $result_config = config_repository_get_configuration();

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

function dbc_repository_close_connection($dbc)
{
    mysqli_close($dbc);
}
