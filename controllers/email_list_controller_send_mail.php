<?php

require(__DIR__ . '../../models/services/email_list_service_send_mail.php');

function email_list_controller_send_mail()
{
    $output_form = false;

    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : null;

    $body = isset($_POST['body']) ?  trim($_POST['body']) : null;

    if (isset($_POST['submit'])) {

        if (empty($subject)) {
            echo 'You forgot the email subject.<br/>';
            $output_form = true;
        }

        if (empty($body)) {
            echo 'You forgot the email body text.<br/>';
            $output_form = true;
        }

        if (!$output_form) {
            email_list_service_send_mail($subject, $body);
        }

    } else {
        $output_form = true;
    }

    $result_view_model = [
        'output_form' => $output_form,
        'subject' => $subject,
        'body' => $body
    ];

    return $result_view_model;
}
