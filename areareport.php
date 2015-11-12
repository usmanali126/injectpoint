<?php
require 'classes/inject_record.php';
if (isset($_POST['search_by_area'])) {
    $obj = new inject_record();
    $result = $obj->report_by_area();
    $total_inject = mysqli_num_rows($result);
//    $row = mysqli_fetch_array($result);
//    print_r($row);
//    exit();
}
$obj = new inject_record();
$uc_result = $obj->get_uc();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Report</title>
        <?php require 'inc/head.php'; ?>
    </head>
    <body>
        <!--<div class="container">-->
        <div id="nav" >
            <?php require 'inc/header.php'; ?>
        </div>

        <div id="dashoard" class="container">
            <div class="row">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Area Wise Report</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-inline col-sm-12" id="search_by_area" action="" method="POST">
                                    <div class="form-group">
                                        <label for="u_council" class="col-sm-2 control-label">Union Council Number</label>
                                        <div class="col-sm-3">
                                            <select form="search_by_area" id="u_council" name="union" class="form-control u_council">
                                                <option disabled="" selected="">Select Uc Number</option>
                                                <?php while ($row = mysqli_fetch_array($uc_result)) { ?>
                                                    <option value="<?php echo $row['number']; ?>"><?php echo $row['number']; ?> | <?php echo $row['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <label for="area" class="col-sm-2 control-label">Area Number</label>
                                        <div class="col-sm-3">
                                            <select form="search_by_area" id="area" name="area" class="form-control area">
                                                <option disabled="" selected="">Select Area Number</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" form="search_by_area" name="search_by_area" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <h4><?php
                            if (isset($error)) {
                                echo $error;
                            }
                            ?></h4>
                        <h4 class="pull-left">UC Number= <span class="selected_date"><?php
                                if (isset($_POST['union'])) {
                                    echo $_POST['union'];
                                }
                                ?></span>
                            <span>, Area Number= <?php
                                if (isset($_POST['area'])) {
                                    echo $_POST['area'];
                                }
                                ?></span></h4>

                        <div class="row top-big-margin">
                            <div class="col-sm-12">
                                <table class="table-responsive table-hover table-striped">
                                    <thead class="table-bordered">
                                        <!--<tr><th class="col-xs-1">Sr.</th><th class="col-xs-1">Card #</th><th class="col-xs-1">Name</th><th class="col-xs-1">Date of birth</th><th class="col-xs-1">Uc.</th><th class="col-xs-1">Area</th><th class="col-xs-1">Inj-1</th><th class="col-xs-1">Inj-2</th><th class="col-xs-1">Inj-3</th><th class="col-xs-1">Inj-4</th><th class="col-xs-1">Inj-5</th><th class="col-xs-1">Inj-6</th></tr>-->
                                        <?php if (isset($result)) { ?>
                                        <tr><th >Sr.</th><th >Card #</th><th >Name</th><th >Date of birth</th><th >Age(Days)</th><th >OPV 0-40</th><th >IPV 106-270</th><th >BCG 0-40</th><th >P1 46-75</th><th >P2 76-105</th><th >P3 106-270</th><th >M1 271-540</th><th >M2 540---</th><th>In Date</th><th>Over Date</th></tr>
                                        <?php } ?>
                                    </thead>
                                    <tbody class="resutl">
                                        <?php
                                        if (isset($result)) {
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $dob = date_create($row['dob']);
                                                $curren_date = date_create(date('d-m-Y'));
                                                $diff = date_diff($dob, $curren_date);
                                                //echo $diff->format("%R%a days");
                                                $days = $diff->format("%a");
//                                               
                                                if (empty($row[14]) && $days > 40) {
                                                    $date1 = TRUE;
                                                } elseif (empty($row[15]) && $days > 45) {
                                                    $date2 = TRUE;
                                                } elseif (empty($row[16]) && $days > 75) {
                                                    $date3 = TRUE;
                                                } elseif (empty($row[17]) && $days > 105) {
                                                    $date4 = TRUE;
                                                } elseif (empty($row[18]) && $days > 270) {
                                                    $date5 = TRUE;
                                                } elseif (empty($row[19]) && $days > 540) {
                                                    $date6 = TRUE;
                                                }
                                                ?>
                                                <tr><td ><?php echo $i++; ?></td><td ><a class="card-no"><?php echo $row['card_number']; ?></a></td><td ><?php echo $row['name']; ?></td><td class="date1"><?php echo $row['dob']; ?></td><td ><?php echo $days; ?></td>
                                                    <td class="date2"><?php echo $row[20]; ?></td>
                                                    <td class="date2" ><?php echo $row[21]; ?></td><td class="date2 <?php
                                                    echo isset($date1) ? 'blue' : '';
                                                    ?>"><?php echo $row[14] ?></td><td class="date2 <?php
                                                    echo isset($date2) ? 'blue' : '';
                                                    ?>"><?php echo $row[15]; ?></td><td class="date2 <?php
                                                    echo isset($date3) ? 'blue' : '';
                                                    ?>"><?php echo $row[16]; ?></td><td class="date2 <?php
                                                    echo isset($date4) ? 'blue' : '';
                                                    ?>"><?php echo $row[17]; ?></td><td class="date2 <?php
                                                    echo isset($date5) ? 'blue' : '';
                                                    ?>"><?php echo $row[18]; ?></td><td class="date2 <?php
                                                    echo isset($date6) ? 'blue' : '';
                                                    ?>"><?php echo $row[19]; ?></td></tr>
                                                        <?php
                                                    $date1=NULL;
                                                    $date2=NULL;
                                                    $date3=NULL;
                                                    $date4=NULL;
                                                    $date5=NULL;
                                                        
                                                }
                                                }
                                                ?>
                                    </tbody>
                                    <?php /* <tfoot>
                                      <tr><td colspan="5"><h4 class="pull-left">Total Injection: <span class="selected_date"><?php
                                      if (isset($total_inject)) {
                                      echo $total_inject;
                                      }
                                      ?></span></h4></td><td class="col-xs-1"></td><td class="col-xs-1"></td><td class="col-xs-1"></td><td class="col-xs-1"></td><td class="col-xs-1"></td><td class="col-xs-1"></td><td class="col-xs-1"></td></tr>
                                      </tfoot> */ ?>
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
<!--http://stackoverflow.com/questions/2040560/finding-the-number-of-days-between-two-dates-->
