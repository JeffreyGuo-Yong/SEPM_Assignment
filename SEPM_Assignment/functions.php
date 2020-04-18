<?php

require 'databaseInfo.php';

function getConnection(){
    $con = new mysqli(serverName, username, passowrd, databaseName);
    return $con;
}

function getMessage($key){
    $data = file_get_contents("messages.json");
    $errors = json_decode($data, true);
    return $errors[$key][content];
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
        return "registerSuccess";
    }else{
        $con->close();
        return "registerFailed";
    }
}

function getUserName($id){
    $con = getConnection();
    $sql = "select nickname from user where id = $id";

    $result = $con->query($sql)->fetch_assoc();
    $con->close();

    return $result['nickname'];
}

function addAddress($name, $phone, $address, $city, $postcode, $state, $id){
    $con = getConnection();
    $sql = "insert into address (name, phone, address, city, state, postcode, user_id) 
            values ('$name', '$phone', '$address', '$city', '$state', '$postcode', $id)";

    if(mysqli_query($con, $sql)){
        $con->close();
        return "addAddressSuccess";
    }else{
        $con->close();
        return "addAddressFailed";
    }
}

function addPayment($paymentMethod, $holder, $account, $date, $cvv, $id){
    $con = getConnection();

    $sql = "insert into payment (type, cardholder, account, expire_date, cvv, user_id)
                values ('$paymentMethod', '$holder', '$account', '$date', '$cvv', $id)";

    if(mysqli_query($con, $sql)){
        $con->close();
        return "addPaymentSuccess";
    }else{
        $con->close();
        return "addPaymentFailed";
    }
}

function getAddressByUserID($id){
    $con = getConnection();

    $sql = "select * from address where user_id = $id";

    $result = $con->query($sql);
    $con->close();

    return $result;
}

function getPaymentByUserID($id){
    $con = getConnection();

    $sql = "select * from payment where user_id = $id";

    $result = $con->query($sql);
    $con->close();

    return $result;
}

function getAddressByAddressID($id){
    $con = getConnection();

    $sql = "select * from address where id = $id";

    $result = $con->query($sql)->fetch_assoc();
    $con->close();

    return $result;
}

function updateAddress($name, $phone, $address, $city, $postcode, $state, $id){
    $con = getConnection();

    $sql = "update address set name = '$name', phone = '$phone', address = '$address', city = '$city', postcode = '$postcode', state = '$state'
            where id = $id";

    if(mysqli_query($con, $sql)){
        $con->close();
        return "addressUpdateSuccess";
    }else{
        $con->close();
        return "addressUpdateFailed";
    }
}

function getPaymentByPaymentID($id){
    $con = getConnection();

    $sql = "select * from payment where id = $id";

    $result = $con->query($sql)->fetch_assoc();
    $con->close();

    return $result;
}

function updatePayment($holder, $account, $date, $cvv, $id){
    $con = getConnection();

    $sql = "update payment set cardholder = '$holder', account = '$account', expire_date='$date', cvv='$cvv'
            where id = $id";

    if(mysqli_query($con, $sql)){
        $con->close();
        return "paymentUpdateSuccess";
    }else{
        $con->close();
        return "paymentUpdateFailed";
    }
}

?>