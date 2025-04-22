
<?php

function email_list_repository_send_email($to, $subject, $message)
{
    $file = __DIR__ . '/../../../config.json';

    $contents = file_get_contents($file);

    $result_config = json_decode($contents, false);

    $email =  $result_config->email;

    $headers = array(
        'From' =>  $email->from,
        'Reply-To' => $email->reply_to,
        'X-Mailer' => 'PHP/' . phpversion()
    );

    return mail($to, $subject, $message, $headers);
}
