<?php
#includes
require_once('model/api.class.php');

#models
$cl_api = new cl_api();

$get_api_class_data = $cl_api->get_api_data();
echo $get_api_class_data;

if(isset($_REQUEST['add'])){
    //Module to add new issue then point to class to add actual data.
    $add_api_class_data = $cl_api->add_api_data();
}