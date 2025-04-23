<?php


function email_list_repository_delete($dbc, $ids_to_delete)
{
    $id_list = implode(',', $ids_to_delete);

    $query = "DELETE FROM email_list WHERE  id IN ($id_list)";

    mysqli_query($dbc, $query) or die('Error to delete an email.');

    $num_affected_rows = mysqli_affected_rows($dbc);

    return $num_affected_rows > 0;
}
