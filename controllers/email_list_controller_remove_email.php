<?php 
require(__DIR__ . '../../models/repository/common/dbc_repository.php');
require(__DIR__ . '../../models/repository/email_list/email_list_repository_select.php');
require(__DIR__ . '../../models/repository/email_list/email_list_repository_delete.php');

function email_list_controller_remove_email()
{
    $result_view_model = [
        'result_delete' => false,
        'result_select' => null
    ];

    $dbc = dbc_repository_get_connection();
    
    if (isset($_POST['submit'])) {
    
        $ids_to_delete = $_POST['ids_to_delete'] ?? [];
        
        if (sizeof($ids_to_delete) > 0) {
            $result_view_model['result_delete'] = email_list_repository_delete($dbc, $ids_to_delete);
        }
    }
    
    $result_view_model['result_select'] = email_list_repository_select($dbc);

    dbc_repository_close_connection($dbc);

    return $result_view_model;
}
