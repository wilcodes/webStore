<?php

function selectDatabase($connection, $database)
{

    if (mysqli_select_db($connection, $database)) {
        echo('selection completed');
    } else {
        exit();
    }

}

;

