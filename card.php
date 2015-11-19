<?php
require_once 'classes/inject_record.php';
if (!isset($_SESSION['name'])) {
    header('Location:index.php?login=login');
}
if (isset($_POST['submit']) || isset($_POST['submit1'])) {
    //print_r($_POST);
    $data = '';
    foreach ($_POST as $key => $value) {
        if ($key == 'mcard_number') {
            if (isset($_POST['submit']) && empty($_POST[$key])) {
                $error = 'Fill empty fields first.';
            } else {
                $data[$key] = $value;
            }

            //exit();
        } elseif (empty($_POST[$key])) {
            $error = 'Fill empty fields first.';
        } else {
            $data[$key] = $value;
        }
    }
    //echo $data[1];
    //print_r($data);
    if (!isset($error)) {
        //echo $data['submit'];
        $obj = new inject_record();
        if (isset($data['submit']) && $data['submit'] == 'submit') {
            $token = 0;
            $result = $obj->add_card($data,$token);
        } elseif (isset($data['submit1']) && $data['submit1'] == 'Submit') {
            $token = 1;
            //echo'child submit';
            $result = $obj->add_card($data, $token);
        } elseif (isset($data['submit1']) && $data['submit1'] == 'Update') {
            $token = 2;
            //echo'child update';
            $result = $obj->add_card($data, $token);
        } else {
            echo 'error is not set';
        }
        //$result = $obj->add_card();
    } else {
        echo 'error is set';
    }
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
        <title>Make a New Card</title>
        <?php require 'inc/head.php'; ?>
    </head>
    <body>
        <!--<div class="container">-->
        <div id="nav" >
            <?php
            require 'inc/header.php';
//            echo $_SESSION['type'].'<br>'.$_SESSION['name'];
//            echo session_status();
//            //print_r($_SESSION);
//            if(empty($_SESSION['name'])){
//                echo 'empty';
//            }else{
//                echo 'not empty';
//            }
            ?>
        </div>

        <div id="dashoard" class="container">
            <div class="row">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Make a New Card</h3>
                    </div>
                    <h4 class="">
                        <?php
                        if (isset($result)) {
                            echo $result;
                        }
                        if (isset($error)) {
                            echo $error;
                        }
                        ?>
                    </h4>
                    <div class="panel-body">
                        <div>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#mother" aria-controls="mother" role="tab" data-toggle="tab">Mother</a></li>
                                <li role="presentation"><a href="#child" aria-controls="child" role="tab" data-toggle="tab">Child</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="mother">
                                    <form class="form-horizontal" id="mcard" role="form" method="POST" action="">
                                        <div class="col-lg-6">
                                            <div class="form-group" >
                                                <label for="m_card" class="col-sm-4 control-label">Card Number</label>
                                                <div class="col-sm-8" id="mother_card">
                                                    <input form="mcard" type="text" class="form-control" name="mcard_number" id="m_card" placeholder="Card Number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="wname" class="col-sm-4 control-label">Woman Name</label>
                                                <div class="col-sm-8">
                                                    <input form="mcard" type="text" class="form-control" name="wname" id="wname" placeholder="Woman Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="hname" class="col-sm-4 control-label">Husband Name</label>
                                                <div class="col-sm-8">
                                                    <input form="mcard" type="text" class="form-control" name="hname" id="hname" placeholder="Husband Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="edd" class="col-sm-4 control-label">EDD</label>
                                                <div class="col-sm-8">
                                                    <input form="mcard" type="text" class="form-control date-picker" name="edd" id="edd" placeholder="Expected Date">
                                                </div>
                                            </div>
                                            <!--</form>-->
                                        </div>

                                        <div class="col-lg-6">
                                            <!--<form class="form-horizontal">-->

                                            <div class="form-group">
                                                <label for="cell" class="col-sm-4 control-label">Cell Number</label>
                                                <div class="col-sm-8">
                                                    <input form="mcard" type="text" class="form-control" name="cell" id="cell" placeholder="Cell Number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="u_council" class="col-sm-4 control-label">Union Council Number</label>
                                                <div class="col-sm-8">
                                                    <select form="mcard" id="u_council" name="union" class="form-control u_council">
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
                                                    <select form="mcard" id="area" name="area" class="form-control area">
                                                        <option disabled="" selected="">Select Area Number</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address" class="col-sm-4 control-label">Address</label>
                                                <div class="col-sm-8">
                                                    <input form="mcard" type="text" class="form-control" name="address" id="address" placeholder="Address">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button name="submit" value="submit" form="mcard" type="submit" class="btn btn-primary pull-right">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade out" id="child">

                                    <form class="form-horizontal" id="card" role="form" method="POST" action="">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="m_card1" class="col-sm-4 control-label">Mother's Card Number</label>
                                                <div class="col-sm-8">
                                                    <input form="card" type="text" class="form-control" name="mcard_number" id="m_card1" placeholder="Mother's Card Number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ccard" class="col-sm-4 control-label">Child's Card Number</label>
                                                <div class="col-sm-8" id="child_card">
                                                    <input form="card" type="text" class="form-control" name="card_number" id="ccard" placeholder="Child's Card Number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-4 control-label">Child Name</label>
                                                <div class="col-sm-8">
                                                    <input form="card" type="text" class="form-control" name="name" id="name" placeholder="Child Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="mname" class="col-sm-4 control-label">Mother Name</label>
                                                <div class="col-sm-8">
                                                    <input form="card" type="text" class="form-control" name="wname" id="mname" placeholder="Mother Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="fname" class="col-sm-4 control-label">Father Name</label>
                                                <div class="col-sm-8">
                                                    <input form="card" type="text" class="form-control" name="fname" id="fname" placeholder="Father Name">
                                                </div>
                                            </div>
                                            <!--</form>-->
                                        </div>

                                        <div class="col-lg-6">
                                            <!--<form class="form-horizontal">-->


                                            <div class="form-group">
                                                <label for="dob" class="col-sm-4 control-label">Date Of Birth</label>
                                                <div class="col-sm-8">
                                                    <input form="card" type="text" class="form-control date-picker" name="dob" id="dob" placeholder="Date of Birth">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="c_cell" class="col-sm-4 control-label">Father Cell Number</label>
                                                <div class="col-sm-8">
                                                    <input form="card" type="text" class="form-control" name="cell" id="c_cell" placeholder="Father Cell Number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="u_council1" class="col-sm-4 control-label">Union Council Number</label>
                                                <div class="col-sm-8">
                                                    <select form="card" id="u_council1" name="union" class="form-control u_council">
                                                        <option disabled="" selected="">Select Uc Number</option>
                                                        <?php
                                                        mysqli_data_seek($uc_result, 0);
                                                        while ($row = mysqli_fetch_array($uc_result)) {
                                                            ?>
                                                            <option value="<?php echo $row['number']; ?>"><?php echo $row['number']; ?> | <?php echo $row['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="area1" class="col-sm-4 control-label">Area Number</label>
                                                <div class="col-sm-8">
                                                    <select form="card" id="area1" name="area" class="form-control area">
                                                        <option disabled="" selected="">Select Area Number</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address1" class="col-sm-4 control-label">Address</label>
                                                <div class="col-sm-8">
                                                    <input form="card" type="text" class="form-control" name="address" id="address1" placeholder="Address">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-12 ">
                                                    <!--                                                        <button name="csubmit" form="card" type="submit" class="btn btn-primary pull-right">Submit</button>-->
                                                    <input id="submit1" name="submit1" form="card" type="submit" class="btn btn-primary pull-right" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
