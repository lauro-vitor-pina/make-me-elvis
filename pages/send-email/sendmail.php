<?php
require('../../functions/repository/common/dbc_repository.php');
require('../../functions/repository/email_list/select_email_list_repository.php');
require('../../functions/repository/email_list/send_email_list_repository.php');

$subject = $_POST['subject'];
$body = $_POST['body'];

$dbc = get_dbc_repository();

$result_select = select_email_list_repository($dbc);

close_dbc_repository($dbc);

while ($row = mysqli_fetch_array($result_select)) {

    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $to  = $row['email'];

    $message = "Dear $first_name $last_name, \n $body";

    $result_send = send_email_list_repository($to, $subject, $message);

    if ($result_send) {
        echo 'Email sent to: ' . $to . '<br/>';
    } else {
        echo 'Error sent email to: ' . $to . '</br>';
    }
}
