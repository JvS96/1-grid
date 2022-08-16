<?php
#includes
include '../model/api.class.php';

#models
$cl_api = new cl_api();

#post values validate
$number = (isset($_POST['number'])) ? $_POST['number'] : '';
$title = (isset($_POST['title'])) ? $_POST['title'] : '';
$description = (isset($_POST['description'])) ? $_POST['description'] : '';
$client = (isset($_POST['client'])) ? $_POST['client'] : '';
$priority = (isset($_POST['priority'])) ? $_POST['priority'] : '';
$type = (isset($_POST['type'])) ? $_POST['type'] : '';
$assignee = (isset($_POST['assigned'])) ? $_POST['assigned'] : '';
$status = (isset($_POST['status'])) ? $_POST['status'] : '';

#init
$add_api_data = $cl_api->add_api_data($number, $title, $description, $client, $priority, $type, $assignee, $status);
