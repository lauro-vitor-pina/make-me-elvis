<?php

require(__DIR__ . '../../../repository/common/dbc_repository.php');
require(__DIR__ . '../../../repository/email_list/email_list_repository_select.php');
require(__DIR__ . '../../../repository/email_list/email_list_repository_send_email.php');


function email_list_service_send_mail($subject, $body)
{
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
            echo 'Error sent email to: ' . $to . ' . Try again.</br>';
        }
    }
}
