<?php

require('../../functions/services/email_list/email_list_service_send_mail.php');

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


if ($output_form) {

?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Make me Elvis - Send email</title>
    </head>

    <body>
        <table>
            <tr>
                <td style="vertical-align: top;">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <table>
                            <tr>
                                <td>
                                    <img src="../../assets/images/elvislogo.gif" alt="Logo">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Subject of e-mail:</label>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="text" name="subject" value="<?php echo $subject; ?>" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Body of e-mail:</label>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <textarea cols="50" rows="10" name="body"><?php echo $body; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" value="Submit">
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
                <td>
                    <img src="../../assets/images/blankface.jpg">
                </td>
            </tr>
        </table>
    </body>

    </html>
<?php } ?>