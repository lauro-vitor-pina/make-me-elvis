<?php

require('../../controllers/email_list_controller_remove_email.php');

$result_view_model = email_list_controller_remove_email();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meke Me Elvis - Remove Email</title>
</head>

<body>
    <table>
        <tr>
            <td style="vertical-align: top;">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <table style="border-spacing: 10px;">
                        <tr>
                            <td>
                                <img src="../../assets/images/elvislogo.gif" alt="Logo">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Please select the email address to delete from email list and click Remove.
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if ($result_view_model['result_delete']) {
                                    echo 'Customer(s) removed.';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table name="table_email_list">

                                    <tr>
                                        <th>#</th>
                                        <th>first name</th>
                                        <th>last name</th>
                                        <th>email</th>
                                    </tr>
                                    <?php while ($row = mysqli_fetch_array($result_view_model['result_select'])) { ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="ids_to_delete[]" value="<?php echo $row['id']; ?>">
                                            </td>
                                            <td>
                                                <?php echo $row['first_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['last_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['email']; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </table>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" value="Remove">
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