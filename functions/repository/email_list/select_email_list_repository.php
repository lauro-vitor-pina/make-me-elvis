<?php

function select_email_list_repository($dbc)
{
    $query = 'SELECT first_name, last_name, email FROM email_list';

    $query_result = mysqli_query($dbc, $query) or die('Error ao acessar o banco de dados');

    return $query_result;
}
