<?php

function email_list_repository_select($dbc)
{
    $query = 'SELECT id, first_name, last_name, email FROM email_list';

    $query_result = mysqli_query($dbc, $query) or die('Error ao acessar o banco de dados');

    return $query_result;
}
