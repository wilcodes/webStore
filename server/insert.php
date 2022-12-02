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

selectDatabase($con, 'test');



function insertSupply ($connection, $id, $quantity, $size, $title){
    $orderId = $id;

    $firstName = $title;
    $lastName = "Colina";
    $address = $size;
    $email = "wrca26@gmail.com";
    $q = $quantity;
    $price = 45.00;

    $query = /** @lang text */
        "
INSERT INTO `orders`(
    `orderId`,
    `firstName`,
    `lastName`,
    `address`,
    `email`,
    `quantity`,
    `price`
)
VALUES(
    '$orderId',
    '$firstName',
    '$lastName',
    '$address',
    '$email',
    '$q',
    '$price'
);
";

    if(mysqli_query($connection,$query )){

        echo("<p>record created succesfully </p>");
    }else {
        echo " Error";
    };

};

//insertSupply($con, $query);

if (isset($_POST['test'])){
//    header('Content-type: text/json');
//    $arr = json_encode($_POST,true);
//   echo $arr;

    //Decode to conver from string json to array and iterate
   foreach (json_decode($_POST['test'],true) as $key => $val){
       //each value equals an associate array with the values of each records

       insertSupply($con,$val['uid'], $val['quantity'], $val['size'], $val['id']);

//
//       }
       echo '<br/>';
    }


}