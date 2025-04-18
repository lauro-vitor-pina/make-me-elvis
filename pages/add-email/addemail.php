<?php

require('../../functions/repository/common/dbc_repository.php');
require ('../../functions/repository/email_list/insert_email_list_repository.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];

$dbc = get_dbc_repository();

insert_email_list_repository($dbc, $first_name, $last_name, $email);

close_dbc_repository($dbc);

echo 'Customer added.';
