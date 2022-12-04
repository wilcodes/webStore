<!DOCTYPE html>
<html>
<head>

    <title>My Threds</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../client/images/favicon.ico">
    <link rel="Stylesheet" href="../client/styles.css" type="text/css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<div class="containerbox">

    <nav class="navbar-container">

        <div class="navbar-logo"><a href="index.html"><img src="../client/images/mythreads-logo.png" alt="" /></a></div>



        <ul role="list" class="navbar-links">

            <li><a href="shop.html">SHOP</a></li>
            <li><a href="cart.html"><img src="../client/images/shopping-bag.png" alt="shopping-bag" /></a></li>

        </ul>

    </nav>



    <div class="heading-container">
        <div class="heading-title">
            <h2>Color your days</h2><h2>and make your story</h2>
            <button class="shop">Shop Now</button>
        </div>
        <div class="heading-images">
            <div><img class="heading-image1" src="../client/images/green.jpg" alt="Green shirt being worn" /></div>
            <div><img class="heading-image2" src="../client/images/blackpeace.jpg" alt="Black peace shirt being worn" /></div>

        </div>
    </div>
    <div class="body-container">
        <div class="body-title">
            <h1>Threds Style</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="body-images">
            <div class="image"><img src="../client/images/shirtprinting.jpg" alt="shirt printing machine" /></div>
            <div class="image"><img src="../client/images/shirts1.jpg" alt="shirts on hangers" /></div>
            <div class="image"><img src="../client/images/shirts2.jpg" alt="shirts on hangers" /></div>
            <div class="image"><img src="../client/images/shirts3.jpg" alt="shirts on hangers" /></div>
        </div>
    </div>


    <footer>
        <div class="foot">
            <div class="social-logos">
                <img class="fb-logo" src="../client/images/fb.png" alt="facebook logo" />
                <img class="instagram-logo" src="../client/images/instagram.png" alt="instagram logo" />
            </div>



            <div class="copyright">&#169; 2022 MyThreds</div>

        </div>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>

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


selectDatabase($con, 'threadStore');

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

        echo"(<div class=\"modal-success\">
        <div class=\"backdrop\">

        </div>
        <div class=\"unique-modal\">
            <div class=\"card\">
                <div class=\"card-header\">
                    Notification
                </div>
                <div class=\"card-body\">
                    <h5 class=\"card-title\">Your Order is complete!</h5>
                    <p class=\"card-text\">We have received your order, thank you for shopping with us! </p>
                    <a href=\"../client/index.html\" class=\"btn btn-primary\">Go home!</a>
                </div>
            </div>
            <script>
                localStorage.clear();
            </script>
        </div>
    </div>)";
    }else {
        echo"(<div class=\"modal-success\">
        <div class=\"backdrop\">

        </div>
        <div class=\"unique-modal\">
            <div class=\"card\">
                <div class=\"card-header\">
                    Notification
                </div>
                <div class=\"card-body\">
                    <h5 class=\"card-title\">There is an error!</h5>
                    <p class=\"card-text\">Verify the information submitted and try again! </p>
                    <a href=\"../client/index.html\" class=\"btn btn-primary\">Go to cart!</a>
                </div>
            </div>
        </div>
    </div>)";
    };

};

if (isset($_POST['records'])){

    foreach (json_decode($_POST['records'],true) as $key => $val){

     insertSupply($con,$val, $customerData);

        echo '<br/>';
    };


};

