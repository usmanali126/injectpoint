<?php 
require_once 'classes/inject_record.php';
if(isset($_POST['submit'])){
    //print_r($_POST);
    if(empty($_POST['user_name']) || empty($_POST['user_password'])){
        $blank='Please fill both fileds';
    }else{
        $obj= new inject_record();
        $result= $obj->login();
        if($result==TRUE){
            $error=TRUE;
             
        }
    }
}
if(isset($_GET['login'])){
    $login=TRUE;
}
if(isset($_GET['logout'])){
    $obj= new inject_record();
    $result= $obj->logout();
    if($result==TRUE){
            $msg=TRUE;
             
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
        <title>Log in</title>
        <?php require 'inc/head.php'; ?>
    </head>
    <body>
        <div class="container">
            <div class="singin">
                <form class="form-signin" method="POST" action="">
                <h2 class="form-signin-heading">Please sign in</h2>
                <label for="user" class="sr-only-focusable">User Name</label>
                <input type="text" required="" id="user" name="user_name" class="form-control" placeholder="User Name"  autofocus>
                <label for="inputPassword" class="sr-only-focusable">Password</label>
                <input type="password" required="" id="inputPassword" name="user_password" class="form-control" placeholder="Password" >
                <?php if(isset($error) || isset($blank)){?>
                <h4 class="text-danger">User name or password is invalid</h4>
                <?php }?>
                <?php if(isset($msg) || isset($blank)){?>
                <h4 class="text-success">LogOut Successfully</h4>
                <?php }?>
                <?php if(isset($login) || isset($blank)){?>
                <h4 class="text-danger">Sign In First</h4>
                <?php }?>
                <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
                <br><p class="text-center">Powered by www.reccatech.com / Usman Ali / 03324153316</p>
                </form>
                
            </div>
        </div> <!-- /container -->
    </body>
<?php require 'inc/footer.php'; ?>
</html>
