<?php

// Store the information of the user in an associtive array

if (isset($_POST)){
    //Decode to conver from string json to array and iterate
    foreach ($_POST as $key => $val){
        //each value equals an associate array with the values of each records
        echo($key);
        if (is_object($val)){
           echo json_encode($val);
        }else{
            echo'<br/>';
            echo($val);
        }


//
//       }
        echo '<br/>';
    }


}

if (isset($_POST['records'])){

    //Decode to conver from string json to array and iterate
    foreach (json_decode($_POST['records'],true) as $key => $val){
        //each value equals an associate array with the values of each records

        foreach ($val as $index => $value){
            echo $index;
            echo '<br/>';
            echo $value;
            echo '<br/>';
        }

//
//       }
        echo '<br/>';
    }


}