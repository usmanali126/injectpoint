<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inject_record
 *
 * @author penguin
 */
require_once 'connection.php';
//if(isset($_POST['id'])){
//    //$obj=new inject_record;
//    $result=array('a','b','c');
//    echo json_encode($result);
//    exit;
//}
//session_start();
if (isset($_POST['id'])) {
    $obj = new inject_record();
    $result = $obj->get_area($_POST['id']);
    while ($row = mysqli_fetch_array($result)) {
        $data[] = array($row['number'], $row['name'], $row['hw_name']);
    }
    if (is_null($data)) {
        $result = array('a');
        echo json_encode($result);
    } else {
        echo json_encode($data);
    }
    exit;
}

if (isset($_POST['mcard'])) {
    $obj = new inject_record();
    $data = array("card" => $_POST['mcard'], "card_column" => "m_card");
    $result = $obj->get_info($data);
    while ($row = mysqli_fetch_array($result)) {
        $data = array($row['m_card'], $row['m_name'], $row['father_name'], $row['cell_number'], $row['concile_id'], $row['area_id'], $row['address']);
    }
    if (is_null($data)) {
        $result = array('Not Avail able');
        echo json_encode($result);
    } else {
        echo json_encode($data);
    }
    exit;
}

class inject_record {

    function db_connection() {
        $conn = new connection();
        $link = $conn->db_connect();
        return $link;
    }

    function login() {
        $link = $this->db_connection();
        $pass = $_POST['user_password'];
        $user = $_POST['user_name'];
        $query = "SELECT password, user_type, name FROM user WHERE user_name='$user'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        if (mysqli_num_rows($result) == 1) {
            $result = mysqli_fetch_array($result);
            //$hash= password_hash($result[0], PASSWORD_DEFAULT);
            //$hash=$result[0];
            //echo $hash;
            //print_r($result);
//           if($result[0]==$pass){
            if (password_verify($pass, $result[0])) {
                //session_start();
                $_SESSION['type'] = $result[1];
                $_SESSION['name'] = $result[2];
                //$_SESSION['type'] = $result[1];
                print_r($_SESSION);
                if(is_null($_SESSION['name'])){
                    echo 'this is null';
                }else{
                     //echo $_SESSION['name'] = $result[2];;
                     header("Location:card.php");
                }
                //echo $_SESSION['type'].'<br>'.$_SESSION['name'];
                exit();
                
            } else {
                return $error = TRUE;
            }
        } else {
            return $error = TRUE;
        }
    }

    function add_card($data, $token) {
        //print_r($data);
        //exit();
        $date = date('d-m-Y');
        $link = $this->db_connection();
        //echo $date;
        //exit();
        switch ($token) {
            case 0:
                $query = "INSERT INTO information (`concile_id`, `area_id`, `m_card`, `m_name`, `father_name`, `address`, `cell_number`, `edd`, `create_date`)VALUES('" . $data['union'] . "','" . $data['area'] . "','" . $data['mcard_number'] . "','" . $data['wname'] . "','" . $data['hname'] . "','" . $data['address'] . "','" . $data['cell'] . "','" . $data['edd'] . "','$date')";
                break;
            case 1:
                $query = "INSERT INTO information (`concile_id`, `area_id`, `card_number`, `name`, `father_name`, `m_name`, `address`, `cell_number`, `dob` , `create_date`)VALUES"
                        . "('" . $data['union'] . "','" . $data['area'] . "','" . $data['card_number'] . "','" . $data['name'] . "','" . $data['fname'] . "','" . $data['wname'] . "','" . $data['address'] . "','" . $data['cell'] . "','" . $data['dob'] . "','$date')";
                break;
            case 2:
                $query = "UPDATE information SET `card_number`='" . $data['card_number'] . "',`name`='" . $data['name'] . "',`dob`='" . $data['dob'] . "' WHERE `m_card`='" . $data['mcard_number'] . "'";
                break;
        }
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        if ($result == TRUE) {
            return 'Record successfully save';
        } else {
            return 'try again';
        }
    }

    function get_info($card) {
        // print_r($card);
        $column = $card['card_column'];
        $card = $card['card'];

        $link = $this->db_connection();
        $query = "SELECT * FROM information WHERE $column='$card'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        if ($result == TRUE) {
            return $result;
        } else {
            return'Record Not Found';
        }
    }

    function update_injection($parm) {
        $link = $this->db_connection();

        $card = $parm[0];
        $index = $parm[1];
        $date = $parm[2];
        $card_column = $parm[3];
        //print_r($parm);
        //exit();

        $query = "UPDATE `information` SET `$index`='$date' WHERE `$card_column`='$card' ";

        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        if ($result == TRUE) {
            return TRUE;
        } else {
            return TRUE;
        }
    }

    function report() {
        $link = $this->db_connection();
        $date = $_POST['date'];
        $query = "SELECT * FROM information WHERE 1_inj='$date' OR 2_inj='$date' OR 3_inj='$date' OR 4_inj='$date' OR 5_inj='$date' OR 6_inj='$date' ";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        if ($result == TRUE) {
            return $result;
        } else {
            return 'Not Found';
        }
    }

    function report_by_area() {
        $link = $this->db_connection();
        $uc = $_POST['union'];
        $area = $_POST['area'];
        $query = "SELECT * FROM information WHERE concile_id='$uc' AND area_id='$area' ";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        if ($result == TRUE) {
            return $result;
        } else {
            return 'Not Found';
        }
    }

    function add_uc() {
        $link = $this->db_connection();
        $name = $_POST['uc_name'];
        $number = $_POST['uc_number'];
        $tehsil = $_POST['uc_tehsil'];

        $query = "INSERT INTO un_concile (name, number, tehsil)VALUE('$name','$number','$tehsil')";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        //exit('worked');
        if ($result == TRUE) {
            //header("Location:area.php?add='uc'");
            return 'Uc Number= ' . $number . ' Added';
            //return TRUE;
        } else {
            return 'try again';
            //return FALSE;
        }
    }

    function get_uc() {
        $link = $this->db_connection();
        $query = "SELECT name, number, tehsil FROM un_concile ORDER BY number ASC";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        return $result;
    }

    function add_area() {
        $link = $this->db_connection();
        $uc = $_POST['uc_name'];
        $name = $_POST['area_name'];
        $number = $_POST['area_number'];
        $hw_name = $_POST['hw_name'];
        $query = "INSERT INTO area VALUE('NULL','$uc','$name','$number','$hw_name')";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        if ($result == TRUE) {
            return 'Area Number= ' . $number . ' Added';
            ;
        } else {
            return 'try again';
        }
    }

    function get_area($id) {
        $link = $this->db_connection();
        if (isset($id)) {
            $query = "SELECT name, number, hw_name From area WHERE concile_id='$id' ORDER BY number ASC";
        } else {
            $query = "SELECT * From area ORDER BY concile_id ASC";
        }

        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        return $result;
    }
    function logout(){
        session_destroy();
        $_GET['logout']=NULL;
        return TRUE;
    }

}
