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

function getAddressOptionsByUserID($id){
    $con = getConnection();

    $sql = "select id, name, address from address where user_id = $id";

    $result = $con->query($sql);
    $con->close();

    return $result;
}

function getCardPaymentOptionsByUserID($id){
    $con = getConnection();

    $sql = "select id, type, account from payment where user_id = $id and type = 'Card'";

    $result = $con->query($sql);
    $con->close();

    return $result;
}

function getPayPalPaymentOptionsByUserID($id){
    $con = getConnection();

    $sql = "select id, type, account from payment where user_id = $id and type = 'PayPal'";

    $result = $con->query($sql);
    $con->close();

    return $result;
}

function addDiary($type, $paperColor, $paperType, $coverColor, $coverText, $coverTheme, $userID, $quantity, $unitPrice, $postage, $amount, $addressID, $paymentID){
    $uniID = uniqid();

    $con = getConnection();

    $sql = "insert into diary (type, paper_color, paper_type, cover_color, cover_text, cover_theme, user_id, uni_id)
            values ('$type', '$paperColor', '$paperType', '$coverColor', '$coverText', $coverTheme, $userID, '$uniID')";

    if(mysqli_query($con, $sql)){
        $con->close();

        if(addOrder($quantity, $unitPrice, $postage, $amount, $userID, $addressID, $paymentID, $uniID)){
            return "orderSuccess";
        }else{
            return "orderFailed";
        }

    }else{
        $con->close();
        return "orderFailed";
    }
}

function addOrder($quantity, $unitPrice, $postage, $amount, $userID, $addressID, $paymentID, $diary_uni_id){
    $con = getConnection();

    $sql = "insert into orders (quantity, unit_price, postage, amount, orderDate, user_id, address_id, payment_id, diary_uni_id)
            values ($quantity, $unitPrice, $postage, $amount, sysdate(), $userID, $addressID, $paymentID, '$diary_uni_id')";

    if(mysqli_query($con, $sql)){
        $con->close();
        return true;
    }else{
        echo mysqli_error($con);
        $con->close();
        return false;
    }
}

function getOrdersByUserID($id){
    $con = getConnection();

    $sql = "select orders.id, orders.amount, orders.orderDate, address.name, address.address
            from orders join address on orders.address_id = address.id
            where orders.user_id = $id
            order by orders.orderDate desc";

    $result = $con->query($sql);
    $con->close();

    return $result;
}

function getOrderDetailsByOrderID($id){
    $con = getConnection();

    $sql = "select *, diary.type as d_type, payment.type as p_type from orders 
            join diary on orders.diary_uni_id = diary.uni_id
            join address on orders.address_id = address.id
            join payment on orders.payment_id = payment.id
            where orders.id = $id";

    $result = $con->query($sql)->fetch_assoc();
    $con->close();

    return $result;
}

function addFeedback($content, $id){
    $con = getConnection();

    $sql = "insert into feedback (content, date, diary_id) values ('$content', sysdate(), $id)";

    if(mysqli_query($con, $sql)){
        $con->close();
        return true;
    }else{
        echo mysqli_error($con);
        $con->close();
        return false;
    }
}

function getFeedbackByDiaryID($id){
    $con = getConnection();

    $sql = "select * from feedback where diary_id = $id";

    $result = $con->query($sql);
    $con->close();

    if($result->num_rows == 0){
        return null;
    }else{
        return $result->fetch_assoc();
    }
}

function getDiaryByUserID($id){
    $con = getConnection();

    $sql = "select * from diary where user_id = $id";

    $result = $con->query($sql);
    $con->close();

    return $result;
}

function getSaleHistory(){
    $con = getConnection();

    $sql = "select * from orders 
            join diary on orders.diary_uni_id = diary.uni_id
            join feedback on diary.id = feedback.diary_id
            order by orders.orderDate desc;";

    $result = $con->query($sql);
    $con->close();

    return $result;
}

?>