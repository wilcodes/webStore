<?php require 'init.php'; ?>
<?php require 'select.php'; ?>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<?php

$con = createCon();
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Store the information of the user in an associtive array

function assignCustomerData (){
    $customerData = array();

    if (isset($_POST)){
        //Decode to conver from string json to array and iterate
        foreach ($_POST as $key => $val){
            //each value equals an associate array with the values of each records
            if ($key === 'records'){
               continue;
            }else{
                $customerData[$key] = $val;

            }
       }

    }
    return $customerData;
};

$customerData = assignCustomerData();


selectDatabase($con, 'testOne');

function insertSupply ($connection, $records, $user){


    $uid = $records['uid'];
    $name = $user['name'];
    $lastName = $user['lastname'];
    $address = $user['address'];
    $id = $records['id'];
    $size = $records['size'];
    $email = $user['email'];
    $quantity = $records['quantity'];
    $price = $records['price'];
    $cardholderName = $user['cardholderName'];
    $cardnumber = $user['cardnumber'];
    $month =$user['month'];
    $year = $user['year'];
    $cvv = $user['cvv'];
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

if (isset($_POST['records'])){

    foreach (json_decode($_POST['records'],true) as $key => $val){

     insertSupply($con,$val, $customerData);

        echo '<br/>';
    }

};

