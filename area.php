<?php
require_once 'classes/inject_record.php';
if (isset($_POST['submit'])) {
    //print_r($_POST);
    $obj = new inject_record();
    $add_result = $obj->add_area();
}
$obj = new inject_record();
$uc_result = $obj->get_uc();
$result = $obj->get_area(null);
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
        <title>Add Area</title>
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
                            <h3 class="panel-title">Add Area</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-5">
                                <?php
                                if (isset($add_result)) {
                                    echo $add_result;
                                }
                                ?>
                                <form class="form-horizontal" id="area" role="form" method="POST" action="">
                                    <div class="form-group">
                                        <label for="uc_name" class="col-sm-5 control-label">Union Council Name</label>
                                        <div class="col-sm-7">
                                            <select form="area" id="uc_name" name="uc_name" class="form-control">
                                                <option disabled="" selected="">Select Uc Name</option>
                                                <?php while ($row = mysqli_fetch_array($uc_result)) { ?>
                                                    <option value="<?php echo $row['number']; ?>"><?php echo $row['number']; ?> | <?php echo $row['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="area_name" class="col-sm-5 control-label">Area Name</label>
                                        <div class="col-sm-7">
                                            <input form="area" type="text" class="form-control" name="area_name" id="area_name" placeholder="Union Council Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="area_no" class="col-sm-5 control-label">Area Number</label>
                                        <div class="col-sm-7">
                                            <input form="area" type="text" class="form-control" name="area_number" id="area_no" placeholder="Union Council Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="area_hw" class="col-sm-5 control-label">H.W Name</label>
                                        <div class="col-sm-7">
                                            <input form="area" type="text" class="form-control" name="hw_name" id="area_hw" placeholder="Union Council Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button name="submit" type="submit" class="btn btn-primary pull-right">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-7">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover ">
                                        <thead>
                                            <tr><th>Sr.#</th><th>UC. Number</th><th>Area Number</th><th>Area Number</th><th>H.W Name</th></tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            //mysqli_data_seek($result,0);
                                            while ($data = mysqli_fetch_array($result)) {
                                                ?>
                                                <tr><td><?php echo $i; ?></td><td><?php echo $data[1]; ?></td><td><?php echo $data[2]; ?></td><td><?php echo $data[3]; ?></td><td><?php echo $data[4]; ?></td></tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
       <!-- </div>  /container -->
    </body>
    <?php require 'inc/footer.php'; ?>
</html>
