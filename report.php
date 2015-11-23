<?php
require 'classes/inject_record.php';
if (!isset($_SESSION['name'])) {
    header('Location:index.php?login=login');
}
$opv = $ipv = $bcg = $p1 = $p2 = $p3 = $m1 = $m2 = $tt1 = $tt2 = 0;
if (isset($_POST['date_search'])) {
    $obj = new inject_record();
    $date = $_POST['date'];
    //echo '%'.$date;
    //exit;

    $result = $obj->report('%' . $date);
    $total_inject = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        //'/'.$date.'/'=$date;
        if (preg_match('/' . $date . '/', $row['opv1'])) {
            $opv++;
        }
        if (preg_match('/' . $date . '/', $row['opv2'])) {
            $ipv++;
        }
        if (preg_match('/' . $date . '/', $row['1_inj'])) {
            $bcg++;
        }
        if (preg_match('/' . $date . '/', $row['2_inj'])) {
            $p1++;
        }
        if (preg_match('/' . $date . '/', $row['3_inj'])) {
            $p2++;
        }
        if (preg_match('/' . $date . '/', $row['4_inj'])) {
            $p3++;
        }
        if (preg_match('/' . $date . '/', $row['5_inj'])) {
            $m1++;
        }
        if (preg_match('/' . $date . '/', $row['6_inj'])) {
            $m2++;
        }
        if (preg_match('/' . $date . '/', $row['tt1'])) {
            $tt1++;
        }
        if (preg_match('/' . $date . '/', $row['tt2'])) {
            $tt2++;
        }
    }
    $total = $opv + $ipv + $bcg + $p1 + $p2 + $p3 + $m1 + $m2 + $tt1 + $tt2;
    //$row = mysqli_fetch_array($result);
    //print_r($row);
    //exit();
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
        <title>Report</title>
        <?php require 'inc/head.php'; ?>
    </head>
    <body>
        <!--<div class="container">-->
            <div id="nav" class="top-margin row">
                <?php require 'inc/header.php'; ?>
            </div>

            <div id="dashoard" class="container no-print">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h3 class="panel-title">Monthly Report</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 left-margin">
                                    <form class="form-inline" id="date_search" action="" method="POST">
                                        <div class="form-group">
                                            <label for="serch_date">Enter Card Number</label>
                                            <input type="text" required="" form="date_search" name="date" class="form-control " id="serch_date" placeholder="Select Date">
                                        </div>
                                        <button type="submit" form="date_search" name="date_search" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                            
                            <button class="btn btn-default pull-right" id="btn-print">Print</button>
                            <div id="print">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Monthly Report</h3>

                                    <h4 class="">Report Month <span class="selected_date"><?php
                                            if (isset($_POST['date'])) {
                                                echo $_POST['date'];
                                            }
                                            ?></span>
                                    </h4>
                                </div>
                                <div class="row top-big-margin">
                                    <div class="col-sm-12">
                                        <table class="table-responsive table-hover table-striped text-center">
                                            <thead class="table-bordered">
                                                <tr><th class="col-xs-2" colspan="2">Total Consumption </th><th class="col-xs-1">OPV</th><th class="col-xs-1">IPV</th><th class="col-xs-1">BCG</th><th class="col-xs-1">P1</th><th class="col-xs-1">P2</th><th class="col-xs-1">P3</th><th class="col-xs-1">M1</th><th class="col-xs-1">M2</th><th class="col-xs-1">TT1</th><th class="col-xs-1">TT2</th></tr>
                                            </thead>
                                            <tbody class="resutl">
                                                <?php
                                                if (isset($result)) {
                                                    ?>
                                                    <tr><td colspan="2"><?php echo $total; ?> </td><td class="col-xs-1"><?php echo $opv; ?> </td><td class="col-xs-1"><?php echo $ipv; ?></td><td class="col-xs-1"><?php echo $bcg; ?></td><td class="col-xs-1 "><?php echo $p1 ?></td><td class="col-xs-1 "><?php echo $p2 ?></td><td class="col-xs-1"><?php echo $p3 ?></td><td class="col-xs-1"><?php echo $m1 ?></td><td class="col-xs-1"><?php echo $m2 ?></td><td class="col-xs-1"><?php echo $tt1 ?></td><td class="col-xs-1"><?php echo $tt2 ?></td></tr>
                                                <?php }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel-heading">
                                    <p class="panel-title">This is a Computer generated  Report (This software design and developed by www.reccatech.com)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> /container -->
    </body>
    <?php require 'inc/footer.php'; ?>
    <script>
        $('#serch_date').datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'mm-yy',
            onClose: function (dateText, inst) {
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, month, 1));
            }
        });
    </script>
    <style>
        .ui-datepicker-calendar {
            display: none;
        }
        .ui-priority-secondary{
            display: none
        }
    </style>
</html>
