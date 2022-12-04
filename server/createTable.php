<?php require 'select.php'; ?>
<?php require 'init.php'; ?>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


?>
<?php

$username = "root";
$servername = "localhost";

//creating connection
$con = @mysqli_connect($servername, $username);

// Check connection

if (!$con) {

    die("Connection failed: " . mysqli_connect_error());
    echo ("<p> Connection failed </p>");
} else {

    echo ("<p> Connection established </p>");
};

$query = "CREATE TABLE `RECORDS` (
  `uid` varchar(36) NOT NULL,
  `name` char(16) NOT NULL,
  `lastname` char(16) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id` char(16) NOT NULL,
  `size` char(1) NOT NULL,
  `quantity` char(1) NOT NULL,
  `price` varchar(1000) NOT NULL,
  `cardholderName` varchar(25) NOT NULL,
  `cardNumber` char(16) NOT NULL,
  `month` varchar(2) NOT NULL,
  `year` varchar(2) NOT NULL,
  `cvv` varchar(3) NOT NULL
);
     ";


selectDatabase( $con, 'testOne' );

function createTable($connection, $query)
{
    if (@mysqli_query($connection, $query)) {

        echo ("<p> created successfully </p>");
    } else {
        echo " Error";
    };
};

createTable($con, $query);






