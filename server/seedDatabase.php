<?php

$username = 'root';
$server='localhost';
// create connection!
$connection = @mysqli_connect($server, $username);

//Function that creates our database
function createDatabase($connection){
    $queryDb = "CREATE DATABASE threadStore";

    if(@mysqli_query($connection, $queryDb)){

        echo("<p> conection to database </p>");
    }else {
        echo " Error";
    };
}


//Function that selects our table
function selectDatabase( $connection, $database){


    if (mysqli_select_db($connection, $database)){
        echo('selection completed');
    }else{
        exit();
    }

};
//Function that creates our table
function createTable($connection){
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

    if (@mysqli_query($connection, $query)) {

        echo ("<p> created successfully </p>");
    } else {
        echo " Error";
    };
};




createDatabase($connection);
selectDatabase( $connection, 'threadStore' );
createTable($connection);
mysqli_close($connection);