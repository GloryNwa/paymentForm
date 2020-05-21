<?php

// session_start();


// $con = mysqli_connect('remotemysql.com','Y7zU17vNOu', 'Z3ocmC37t7');

// if (!$con)
// {
//     echo 'Not connected to server';
// }

// if (!mysqli_select_db($con, 'Y7zU17vNOu'))
// {
//     echo 'Database not selected';
// }

session_start();


$con = mysqli_connect('localhost','root', '');

if (!$con)
{
    echo 'Not connected to server';
}

if (!mysqli_select_db($con, 'imm'))
{
    echo 'Database not selected';
}



//Paystack verification

$curl = curl_init();
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if(!$reference){
    die('No reference supplied');
}

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "accept: application/json",
        "authorization: Bearer sk_test_858bc6de2e4a4e4b138356234bcc15ac99a373d0",
        "cache-control: no-cache"
    ],
));

$response = curl_exec($curl);
$err = curl_error($curl);



if($err){
    // there was an error contacting the Paystack API
    die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);


//var_dump($tranx);exit;


if(!$tranx->status){
    // there was an error from the API
    die('API returned error: ' . $tranx->message);
}

if('success' == $tranx->data->status){
    // transaction was successful...
    // please check other things like whether you already gave value for this ref
    // if the email matches the customer who owns the product etc
    // Give value

    if (isset($_POST['title'])){

        $title = $_POST['title'];
        $surname = $_POST['surname'];
        $firsty = $_POST['first'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $member = $_POST['member'];
        $zonal = $_POST['zonal'];
        $partner = $_POST['partner'];
        $amount =  $tranx->data->amount / 100;
        $type =  $_POST['type'];

        $sql = "INSERT INTO form (title,surname,firsty,email,phone,member,zone,partner,amount,type) VALUES ('$title', '$surname', 
'$firsty', '$email', '$phone','$country', '$member', '$zonal', '$partner','$amount','$type')";

        if (!mysqli_query($con, $sql))
        {
            echo mysqli_error($con);
          //  var_dump(false);exit;
        } else {
           var_dump(true);
            exit;

        }


//    header("refresh:2; url=index.php");

    }else{
        var_dump(false);exit;
    }
}







