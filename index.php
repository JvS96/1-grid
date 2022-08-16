<?php
#includes
include 'header.html';
include 'model/api.class.php';

#models
$cl_api = new cl_api();

#init
$get_api_class_data = $cl_api->get_api_data();

?>
<html>
    <body>
        <div class='row' style="padding: 2%;">
            <div class='col-md-12'>
                <!-- Open The Modal -->
                <button id="list_issue" class="alert alert-success">Add New Issue</button>
                <!-- The Modal -->
                <div id="issue_module" class="modal">
                    <!-- Modal content -->
                    <div class="issue-content">
                        <?php include 'modal/issue_modal.php';?>
                    </div>
                </div>
            </div>
            <div class='col-md-8'>
                <!-- Show Issues -->
                <?= $get_api_class_data; ?>
            </div>
        </div>
        <script>
            <?php #include script file for modal
                include 'script/modal_script.js'
            ?>
        </script>
    </body>
</html>
