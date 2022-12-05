<?php


function createCon()
{
    $username = "root";
    $servername = "localhost";
    //creating connection
    return @mysqli_connect($servername, $username);
}