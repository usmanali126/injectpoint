<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connection
 *
 * @author penguin
 */
class connection {
    function db_connect(){
        $connection=  mysqli_connect('localhost', 'root', '', 'inject_point');
        if($connection->connect_error){
            die("Connection Fail".$connection->connect_error);
        }else{
            return $connection;
        }
    }
}
