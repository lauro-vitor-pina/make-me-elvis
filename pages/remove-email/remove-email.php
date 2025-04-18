<?php

require('../../functions/repository/common/dbc_repository.php');
require('../../functions/repository/email_list/delete_email_list_repository.php');

$email = $_POST['email'];

$dbc = get_dbc_repository();

$result_delete = delete_email_list_repository($dbc, $email);

close_dbc_repository($dbc);

if ($result_delete) {
    echo 'Email removed: ' . $email;
} else {
    echo 'E-mail not removed';
}
