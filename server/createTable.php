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

$query = "CREATE TABLE IF NOT EXISTS RECORDS(  
     `uid` CHAR(16) PRIMARY KEY,
     `name` CHAR(16) NOT NULL, 
     `lastname` CHAR(16) NOT NULL, 
     `address` CHAR(255) NOT NULL,
     `email` CHAR(16) NOT NULL,
     `id` CHAR(16) NOT NULL,  
     `size` CHAR(1) NOT NULL, 
    `quantity` CHAR(1) NOT NULL, 
     `price` DECIMAL(7,2) NOT NULL,
    `cardholderName` CHAR(25) NOT NULL,
    `cardNumber` CHAR(16) NOT NULL,
    `month` INT(2) NOT NULL, 
    `year` INT(2) NOT NULL,
     `cvv` INT(3) NOT NULL
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






