<?php

require 'databaseInfo.php';

function getConnection(){
    $con = new mysqli(serverName, username, passowrd, databaseName);
    return $con;
}

function getErrorMessage($error){
    $data = file_get_contents("errors.json");
    $errors = json_decode($data, true);
    return $errors[$error][content];
}

function login($email, $password){
    $con = getConnection();
    $sql = "select * from user where email = '$email' and password = '$password'";

    $result = $con->query($sql);
    $con->close();

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if($user['usability'] == 0){
            return $user['id'];
        }else{
            return "error2";
        }
    }else{
        return "error1";
    }
}

function register($email, $password, $nickname){
    $con = getConnection();
    $sql = "insert into user (email, password, nickname, usability) values ('$email', '$password', '$nickname', 0)";

    if(mysqli_query($con, $sql)){
        $con->close();
        return "success";
    }else{
        $con->close();
        return "failed";
    }
}

function getUserName($id){
    $con = getConnection();
    $sql = "select nickname from user where id = $id";

    $result = $con->query($sql)->fetch_assoc();
    $con->close();

    return $result['nickname'];
}

?>