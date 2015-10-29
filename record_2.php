<?php
require 'classes/inject_record.php';
if (isset($_POST['card'])) {
    echo $_POST['card'];
}
if (isset($_POST['search'])) {
    //print_r($_POST);
    //exit();
    if (empty($_POST['card_number'])) {
        $error = 'Write Child card number in search field.';
    } else {
        $data=array("card"=>$_POST['card_number'], "token"=>TRUE);
        $obj = new inject_record();
        $result = $obj->get_info($data);
        $row = mysqli_fetch_array($result);
        $dob=  date_create($row['dob']);
        $curren_date=  date_create(date('Y-m-d'));
        $diff=  date_diff($dob, $curren_date);
       //echo $diff->format("%R%a days");
       $days=$diff->format("%a"); 
        //echo $row[4].'result';
        //print_r($row);
        
    }
}
if (isset($_POST['update'])) {
    $arr_size = sizeof($_POST['date']);
    switch ($arr_size) {
        case 5:
            $index = 2;
            break;
        case 4:
            $index = 3;
            break;
        case 3:
            $index = 4;
            break;
        case 2:
            $index = 5;
            break;
        case 1:
            $index = 6;
            break;

        default:
            $index = 1;
            break;
    }
//    print_r($_POST);
    $i = 0;
    while ($i < $arr_size) {
        if (!empty($_POST['date'][$i])) {
            $parm = array($_POST['card_number'], $index, $_POST['date'][$i]);
            $obj = new inject_record();
            $result = $obj->update_injection($parm);
            break;
            //}else{
            //echo '<br>epmty';
        }
        $i++;
    }
    if ($result == TRUE) {
        $obj = new inject_record();
        $result = $obj->get_info();
        $row = mysqli_fetch_array($result);
    } else {
        $error = 'Try Again';
    }
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Add Record</title>
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
                        <h3 class="panel-title">Add Record</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-inline pull-right" id="search" action="" method="POST">
                                    <div class="form-group">
                                        <label for="card_number">Enter Card Number</label>
                                        <input type="text" form="search" name="card_number" class="form-control" id="card_number" placeholder="Card Number">
                                    </div>
                                    <button type="submit" form="search" name="search" class="btn btn-primary">Search</button>
                                    <h4 class="danger"><?php
                                        if (isset($error)) {
                                            echo $error;
                                        }
                                        ?></h4>
                                </form>
                            </div>
                        </div>

                        <div class="row top-big-margin" >
                            <div class="col-md-2">
                                <div class="bold" >Card Number</div>
                                <div class="bold" >Union Council Number</div>
                                <div class="bold" >Area Number</div>
                                <div class="bold" >Address</div>
                                <div class="bold" >Child Name</div>
                            </div>
                            <div class="col-md-4">
                                <div><span><?php
                                        if (isset($row)) {
                                            echo $row['card_number'];
                                            $card = $row['card_number'];
                                        }
                                        ?></span></div>
                                <div><span><?php
                                        if (isset($row)) {
                                            echo $row['concile_id'];
                                        }
                                        ?></span></div>
                                <div><span><?php
                                        if (isset($row)) {
                                            echo $row['area_id'];
                                        }
                                        ?></span></div>
                                <div><span><?php
                                        if (isset($row)) {
                                            echo $row['address'];
                                        }
                                        ?></span></div>
                                <div><span><?php
                                        if (isset($row)) {
                                            echo $row['name'];
                                        }
                                        ?></span></div>
                            </div>
                            <div class="col-md-2">
                                <div class="bold" >Date of birth</div>
                                <div class="bold" >Age (Days)</div>
                                <div class="bold" >Mother Name</div>
                                <div class="bold" >Father Name</div>
                                <div class="bold" >Father's Cell Number</div>
                                
                            </div>
                            <div class="col-md-4">
                                <div><span><?php
                                        if (isset($row)) {
                                            echo $row['dob'];
                                        }
                                        ?></span></div>
                                <div><span><?php
                                        if (isset($row)) {
                                            echo $days;
                                        }
                                        ?></span></div>
                                
                                <div><span><?php
                                        if (isset($row)) {
                                            echo $row['m_name'];
                                        }
                                        ?></span></div>
                                <div><span><?php
                                        if (isset($row)) {
                                            echo $row['father_name'];
                                        }
                                        ?></span></div>
                                <div><span><?php
                                        if (isset($row)) {
                                            echo $row['cell_number'];
                                        }
                                        ?></span></div>
                                
                            </div>
                        </div>
                        <div class="row top-big-margin top-border">
                            <form name="dates" id="injection" method="POST" action="">
                                <input class="hidden" value="<?php
                                if (isset($card)) {
                                    echo $card;
                                }
                                ?>" name="card_number" form="injection">
                                <div class="col-sm-2"><div class="bold">BCG 0-40</div><div><?php
                                        if (isset($row) && !(empty($row[14]))) {
                                            echo $row[14];
                                        } else {
                                            echo '<input class="inject_date date-picker" form="injection" name="date[]" placeholder="Date"></input>';
                                        }
                                        ?></div></div>
                                <div class="col-sm-2"><div class="bold">P1 0-45</div><div><?php
                                        if (isset($row) && !(empty($row[15]))) {
                                            echo $row[15];
                                        } else {
                                            echo '<input class="inject_date date-picker" form="injection" name="date[]" placeholder="Date"></input>';
                                        }
                                        ?></div></div>
                                <div class="col-sm-2"><div class="bold">P2 46-76</div><div><?php
                                        if (isset($row) && !(empty($row[16]))) {
                                            echo $row[16];
                                        } else {
                                            echo '<input class="inject_date date-picker" form="injection" name="date[]" placeholder="Date"></input>';
                                        }
                                        ?></div></div>
                                <div class="col-sm-2"><div class="bold">P3 77-106</div><div><?php
                                        if (isset($row) && !(empty($row[17]))) {
                                            echo $row[17];
                                        } else {
                                            echo '<input class="inject_date date-picker" form="injection" name="date[]" placeholder="Date"></input>';
                                        }
                                        ?></div></div>
                                <div class="col-sm-2"><div class="bold">M1 107-275</div><div><?php
                                        if (isset($row) && !(empty($row[18]))) {
                                            echo $row[18];
                                        } else {
                                            echo '<input class="inject_date date-picker" form="injection" name="date[]" placeholder="Date"></input>';
                                        }
                                        ?></div></div>
                                <div class="col-sm-2"><div class="bold">M2 271-540</div><div><?php
                                        if (isset($row) && !(empty($row[19]))) {
                                            echo $row[19];
                                        } else {
                                            echo '<input class="inject_date date-picker" form="injection" name="date[]" placeholder="Date"></input>';
                                        }
                                        ?></div></div>
                                <div class="col-sm-2"><div class="bold">OPV1 0-40</div><div><?php
                                        if (isset($row) && !(empty($row[20]))) {
                                            echo $row[20];
                                        } else {
                                            echo '<input class="inject_date date-picker" form="injection" name="date[]" placeholder="Date"></input>';
                                        }
                                        ?></div></div>
                                <div class="col-sm-2"><div class="bold">OPV2 41-45</div><div><?php
                                        if (isset($row) && !(empty($row[21]))) {
                                            echo $row[21];
                                        } else {
                                            echo '<input class="inject_date date-picker" form="injection" name="date[]" placeholder="Date"></input>';
                                        }
                                        ?></div></div>
                            </form>
                        </div>
                        <div class="row top-big-margin top-border">
                            <div class="col-sm-12 top-big-margin">
                                <button type="submit" name="update" form="injection" value="update" class="btn btn-primary pull-right">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> /container -->
    </body>
    <?php require 'inc/footer.php'; ?>
</html>
