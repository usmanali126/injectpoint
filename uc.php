<?php
require_once 'classes/inject_record.php';
if(!isset($_SESSION['name'])){
    header('Location:index.php?login=login');
}
if (isset($_POST['submit'])) {
    //print_r($_POST);
    $obj = new inject_record();
    $add_result = $obj->add_uc();
}
$obj = new inject_record();
$result = $obj->get_uc();
//print_r($result);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Add Uc</title>
        <?php require 'inc/head.php'; ?>
    </head>
    <body>
        <!--<div class="container">-->
            <div id="nav">
                <?php require 'inc/header.php'; ?>
            </div>

            <div id="dashoard" class="container">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Uc</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-6">
                                <?php
                                if (isset($add_result)) {
                                    echo $add_result;
                                }
                                ?>
                                <form class="form-horizontal" id="uc" role="form" method="POST" action="">
                                    <div class="form-group">
                                        <label for="uc_name" class="col-sm-4 control-label">Union Council Name</label>
                                        <div class="col-sm-8">
                                            <input form="uc" type="text" class="form-control" name="uc_name" id="uc_name" placeholder="Union Council Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="uc_no" class="col-sm-4 control-label">Union Council Number</label>
                                        <div class="col-sm-8">
                                            <input form="uc" type="text" class="form-control" name="uc_number" id="uc_no" placeholder="Union Council Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="uc_tehsil" class="col-sm-4 control-label">Union Council Tehsil</label>
                                        <div class="col-sm-8">
                                            <input form="uc" type="text" class="form-control" name="uc_tehsil" id="uc_no" placeholder="Tehsil Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button name="submit" type="submit" class="btn btn-primary pull-right">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-6">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover ">
                                        <thead>
                                            <tr><th>Sr.#</th><th>UC. Name</th><th>UC. Number</th><th>UC. Tehsil</th></tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                            while ($data=mysqli_fetch_array($result)) { ?>
                                            <tr><td><?php echo $i; ?></td><td><?php echo $data['name']; ?></td><td><?php echo $data['number']; ?></td><td><?php echo $data['tehsil']; ?></td></tr>
                                            <?php $i++;} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <!--</div>  /container -->
    </body>
    <?php require 'inc/footer.php'; ?>
</html>
