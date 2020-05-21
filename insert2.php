<?php
session_start();


$con = mysqli_connect('remotemysql.com','Y7zU17vNOu', 'Z3ocmC37t7');

if (!$con)
{
    echo 'Not connected to server';
}

if (!mysqli_select_db($con, 'Y7zU17vNOu'))
{
    echo 'Database not selected';
}

if (isset($_POST['title'])){

    $title = $_POST['title'];
    $surname = $_POST['surname'];
    $firsty = $_POST['first'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $member = $_POST['member'];
    $zonal = $_POST['zonal'];
    $partner = $_POST['partner'];
    $amount =  $_POST['amount'];
    $type =  $_POST['type'];

    $sql = "INSERT INTO form (title,surname,firsty,email,phone,member,zone,partner,amount,type) VALUES ('$title', '$surname', 
'$firsty', '$email', '$phone', '$member', '$zonal', '$partner','$amount','$type')";

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
?>