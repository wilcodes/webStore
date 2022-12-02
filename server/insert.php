<?php require 'init.php';?>
<?php require 'select.php';?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Creating dummy data for test
$con = createCon();
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo("<p> Connection established </p>");
};

selectDatabase($con, 'testOne');

$uid = $records['uid'];
$name = $user['name'];
$lastName = $user['lastname'];
$address = $user['address'];
$email = $user['email'];
$id = $records['id'];
$size = $records['size'];
$quantity = $records['quantity'];
$price = $records['price'];
$cardholderName = $user['cardholderName'];
$cardnumber = $user['cardnumber'];
$month =$user['month'];
$year = $user['year'];
$cvv = $user['cvv'];

function insertSupply ($connection, $records, $user){
    $uid = 'ca55795a-7295-11ed-80f4-b62db7eca773';
    $name = 'wilfredo';
    $lastName = 'colina';
    $address = '1303 el camino';
    $email = 'wrca26@gmail.com';
    $id = 'pretty tshirt';
    $size = 'm';
    $quantity = '2';
    $price = '25';
    $cardholderName = 'wilfredo Colina';
    $cardnumber = '3456123412341234';
    $month ='23';
    $year = '12';
    $cvv = '123';
    $query = /** @lang text */
        "
INSERT INTO 
`RECORDS` (`uid`, `name`, `lastname`, `address`, `email`, `id`, `size`, `quantity`, `price`, `cardholderName`, `cardNumber`, `month`, `year`, `cvv`)
 VALUES ('$uid', '$name', '$lastName', '$address', '$email', '$id', '$size', '$quantity', '$price', '$cardholderName', '$cardnumber', '$month', '$year', '$cvv')
";

    if(mysqli_query($connection,$query )){

        echo("<p>record created succesfully </p>");
    }else {
        echo " Error";
    };

};


insertSupply($con);

