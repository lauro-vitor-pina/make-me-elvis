<?php

function config_repository_get_configuration()
{
    $file_name = config_repository_is_local_environment() ? 'config.dev.json' :  'config.prd.json';

    $file = __DIR__ . '/../../../' . $file_name;

    if (!file_exists($file)) {
        die("Arquivo de configuração '$file' não encontrado.");
    }

    $contents = file_get_contents($file);

    $result_config = json_decode($contents, false);

    return $result_config;
}


function config_repository_is_local_environment()
{
    $host = $_SERVER['SERVER_NAME'] ?? '';

    return in_array($host, ['localhost', '127.0.0.1']);
}
