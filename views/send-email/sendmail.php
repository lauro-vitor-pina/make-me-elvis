<?php

require('../../controllers/email_list_controller_send_mail.php');

$result_view_model = email_list_controller_send_mail();

if (!$result_view_model['output_form']) {
    return;
}

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
                                <input type="text" name="subject" value="<?php echo $result_view_model['subject']; ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Body of e-mail:</label>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <textarea cols="50" rows="10" name="body"><?php echo $result_view_model['body']; ?></textarea>
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