<?php require 'select.php'; ?>
<?php require 'init.php'; ?>
<?php

$con = createCon();

$query = "CREATE TABLE IF NOT EXISTS ORDERS(  

     `orderId` INT PRIMARY KEY,
     `firstName` CHAR(16) NOT NULL, 
     `lastName` CHAR(16) NOT NULL, 
     `address` CHAR(255) NOT NULL,
     `email` CHAR(16) NOT NULL,  
     `quantity` INT(16) NOT NULL, 
     `price` DECIMAL(7,2) NOT NULL
     );
     ";

selectDatabase( $con, 'test' );
function createTable($connection, $query)
{
    if (@mysqli_query($connection, $query)) {

        echo ("<p> created successfully </p>");
    } else {
        echo " Error";
    };
};

createTable($con, $query);






