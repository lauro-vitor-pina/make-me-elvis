<?php


function delete_email_list_repository($dbc, $email)
{
    $query = "DELETE FROM email_list WHERE email = '$email' ";

    mysqli_query($dbc, $query) or die('Error to delete an email.');

    $num_affected_rows = mysqli_affected_rows($dbc);

    return $num_affected_rows > 0;
}
