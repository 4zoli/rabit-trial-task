<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RabIT-Trial-Task</title>
    <link rel="stylesheet" href="~/../libs/bootstrap.css">
    <script src="~/../libs/jquery.min.js"></script>
    <script src="~/../libs/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <a href="users" class="btn btn-success pull-left">Users</a>
                    <h2 class="pull-left">RabIT-Trial-Task</h2>
                    <a href="advertisements" class="btn btn-success pull-right">Advertisements</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
    session_unset();
    require_once 'controller/controller.php';
    $controller = new controller();
    $controller->requestHandler();
?>