<?php
require 'classes/inject_record.php';
if(!isset($_SESSION['name'])){
    header('Location:index.php?login=login');
}
if (isset($_POST['date_search'])) {
    $obj = new inject_record();
    $date = $_POST['date'];
    //echo '%'.$date;
    //exit;
    $result = $obj->report('%'.$date);
    $total_inject=  mysqli_num_rows($result);
    //$row = mysqli_fetch_array($result);
    //print_r($row);
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
        <div class="container">
            <div id="nav" class="top-margin row">
                <?php require 'inc/header.php'; ?>
            </div>

            <div id="dashoard">
                <div class="row">
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            <h3 class="panel-title">Date Wise Report</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 left-margin">
                                    <form class="form-inline" id="date_search" action="" method="POST">
                                        <div class="form-group">
                                            <label for="serch_date">Enter Card Number</label>
                                            <input type="text" required="" form="date_search" name="date" class="form-control " id="serch_date" placeholder="Select Date">
                                        </div>
                                        <button type="submit" form="date_search" name="date_search" class="btn btn-success">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <h4><?php
                                if (isset($error)) {
                                    echo $error;
                                }
                                ?></h4>
                            <h4 class="pull-left">Selected Month: <span class="selected_date"><?php
                                if (isset($_POST['date'])) {
                                    echo $_POST['date'];
                                }
                                ?></span></h4>
                            
                            <div class="row top-big-margin">
                                <div class="col-sm-12">
                                    <table class="table-responsive table-hover table-striped">
                                        <thead class="table-bordered">
                                            <tr><th class="col-xs-1">Sr.</th><th class="col-xs-1">Card #</th><th class="col-xs-1">Name</th><th class="col-xs-1">Uc.</th><th class="col-xs-1">Area</th><th class="col-xs-1">Inj-1</th><th class="col-xs-1">Inj-2</th><th class="col-xs-1">Inj-3</th><th class="col-xs-1">Inj-4</th><th class="col-xs-1">Inj-5</th><th class="col-xs-1">Inj-6</th></tr>
                                        </thead>
                                        <tbody class="resutl">
                                            <?php
                                            if(isset($result)){
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                //print_r($row);
                                                //echo $row[9];
                                                //exit();
                                                if($_POST['date']== $row[9]){
                                                    $date1=$row[9];
                                                }else{
                                                  $date1='';  
                                                }
                                                if($_POST['date']== $row[10]){
                                                   $date2=$row[10];
                                                }else{
                                                   $date2=''; 
                                                }
                                                if($_POST['date']== $row[11]){
                                                    $date3=$row[11];
                                                }else{
                                                $date3='';
                                                }
                                                if($_POST['date']== $row[12]){
                                                    $date4=$row[12];
                                                }else{
                                                    $date4='';
                                                }
                                                if($_POST['date']== $row[13]){
                                                    $date5=$row[13];
                                                }else{
                                                    $date5='';
                                                }
                                                if($_POST['date']== $row[14]){
                                                    $date6=$row[14];
                                                }else{
                                                    $date6='';
                                                }
                                                
                                                ?>
                                                <tr><td class="col-xs-1"><?php echo $i++; ?></td><td class="col-xs-1"><?php echo $row[3]; ?></td><td class="col-xs-1"><?php echo $row[4]; ?></td><td class="col-xs-1"><?php echo $row[1]; ?></td><td class="col-xs-1"><?php echo $row[2]; ?></td><td class="col-xs-1 <?php echo $date1 ?>"><?php echo $row['1_inj'] ?></td><td class="col-xs-1 <?php echo $date2; ?>"><?php echo $row['2_inj'] ?></td><td class="col-xs-1 <?php echo $date3; ?>"><?php echo $row['3_inj'] ?></td><td class="col-xs-1 <?php echo $date4; ?>"><?php echo $row['4_inj'] ?></td><td class="col-xs-1 <?php echo $date5; ?>"><?php echo $row['5_inj'] ?></td><td class="col-xs-1 <?php echo $date6; ?>"><?php echo $row['6_inj'] ?></td></tr>
                                            <?php }
                                            
                                                }
                                                    ?>
                                        </tbody>
                                        <tfoot>
                                            <tr><td colspan="5"><h4 class="pull-left">Total Injection: <span class="selected_date"><?php
                                if (isset($total_inject)) {
                                    echo $total_inject;
                                }
                                ?></span></h4></td><td class="col-xs-1"></td><td class="col-xs-1"></td><td class="col-xs-1"></td><td class="col-xs-1"></td><td class="col-xs-1"></td><td class="col-xs-1"></td><td class="col-xs-1"></td></tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->
    </body>
    <?php require 'inc/footer.php'; ?>
    <script>
    $('#serch_date').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'mm-yy',
        onClose: function(dateText, inst) { 
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
