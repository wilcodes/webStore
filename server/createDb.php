<?php

$username = 'root';

$server='localhost';

$query = "CREATE DATABASE testOne";
$connection = @mysqli_connect($server, $username);

if(@mysqli_query($connection, $query)){

    echo("<p> conection to database </p>");
}else {
    echo " Error";
};

mysqli_close($connection);