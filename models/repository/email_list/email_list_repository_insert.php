<?php


function email_list_repository_insert($dbc, $first_name, $last_name, $email)
{
    $query = 'INSERT INTO email_list (first_name, last_name, email) ' . "VALUES ('$first_name','$last_name','$email')";

    mysqli_query($dbc, $query) or die('Error ao acessar o banco de dados');
}
