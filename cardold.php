<?php
require_once 'classes/inject_record.php';
if (isset($_POST['submit'])) {
    //print_r($_POST);
    $obj = new inject_record();
    $result = $obj->add_card();
}
$obj = new inject_record();
$uc_result = $obj->get_uc();
//$result = $obj->get_area(null);
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
        <title>Dashboard</title>
        <?php require 'inc/head.php'; ?>
    </head>
    <body>
        <div class="container">
            <div id="nav" class="top-margin row">
                <?php require 'inc/header.php'; ?>
            </div>

            <div id="dashoard">
                <div class="row">
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            <h3 class="panel-title">Make a New Card</h3>
                        </div>
                        <h4 class="">
                            <?php
                            if (isset($result)) {
                                echo $result;
                            }
                            ?>
                        </h4>
                        <div class="panel-body">
                            <div class="col-lg-6">

                                <form class="form-horizontal" id="card" role="form" method="POST" action="">
                                    <div class="form-group">
                                        <label for="card" class="col-sm-4 control-label">Card Number</label>
                                        <div class="col-sm-8">
                                            <input form="card" type="text" class="form-control" name="card_number" id="card" placeholder="Card Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="u_council" class="col-sm-4 control-label">Union Council Number</label>
                                        <div class="col-sm-8">
                                            <select form="card" id="u_council" name="union" class="form-control">
                                                <option disabled="" selected="">Select Uc Number</option>
                                                <?php while ($row = mysqli_fetch_array($uc_result)) { ?>
                                                    <option value="<?php echo $row['number']; ?>"><?php echo $row['number']; ?> | <?php echo $row['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="area" class="col-sm-4 control-label">Area Number</label>
                                        <div class="col-sm-8">
                                            <select form="card" id="area" name="area" class="form-control">
                                                <option disabled="" selected="">Select Area Number</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-4 control-label">Child Name</label>
                                        <div class="col-sm-8">
                                            <input form="card" type="text" class="form-control" name="name" id="name" placeholder="Child Name">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-6">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="dob" class="col-sm-4 control-label">Date of Birth</label>
                                        <div class="col-sm-8">
                                            <input form="card" type="text" class="form-control date-picker" name="dob" id="dob" placeholder="Date of birth">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fname" class="col-sm-4 control-label">Father Name</label>
                                        <div class="col-sm-8">
                                            <input form="card" type="text" class="form-control" name="fname" id="fname" placeholder="Child Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cell" class="col-sm-4 control-label">Father Cell Number</label>
                                        <div class="col-sm-8">
                                            <input form="card" type="text" class="form-control" name="cell" id="cell" placeholder="Father Cell Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-sm-4 control-label">Address</label>
                                        <div class="col-sm-8">
                                            <input form="card" type="text" class="form-control" name="address" id="address" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10 ">
                                            <button name="submit" form="card" type="submit" class="btn btn-success pull-right">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div> <!-- /container -->
    </body>
    <?php require 'inc/footer.php'; ?>
</html>
