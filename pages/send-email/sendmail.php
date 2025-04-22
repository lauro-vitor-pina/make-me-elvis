<?php
require('../../functions/repository/common/dbc_repository.php');
require('../../functions/repository/email_list/email_list_repository_select.php');
require('../../functions/repository/email_list/email_list_repository_send_email.php');

$subject = $_POST['subject'];
$body = $_POST['body'];

if(empty($subject) || empty($body)){
    echo 'You forgot the email subject or body text.';
    return;
}

$dbc = get_dbc_repository();

$result_select = email_list_repository_select($dbc);

close_dbc_repository($dbc);

while ($row = mysqli_fetch_array($result_select)) {

    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $to  = $row['email'];

    $message = "Dear $first_name $last_name, \n $body";

    $result_send = email_list_repository_send_email($to, $subject, $message);

    if ($result_send) {
        echo 'Email sent to: ' . $to . '<br/>';
    } else {
        echo 'Error sent email to: ' . $to . '</br>';
    }
}
