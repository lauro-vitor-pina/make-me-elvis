<?php
require(__DIR__ . '../../models/repository/common/dbc_repository.php');
require(__DIR__ . '../../models/repository/email_list/email_list_repository_insert.php');

function email_list_controller_add_email()
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $dbc = dbc_repository_get_connection();

    email_list_repository_insert($dbc, $first_name, $last_name, $email);

    dbc_repository_close_connection($dbc);
}
