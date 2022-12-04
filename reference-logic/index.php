<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tester</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"
    />
   <style>
       h1{
           text-align: center;
           margin: 1rem;
       }
   </style>
</head>
<body>
<h1 >Choose your item</h1>

<div class="container text-center">
    <div class="row">

        <div class="col">
            <div class="card" style="width: auto">
                <div class="card-body">
                    <h5 class="card-title">Item 1</h5>

                    <p class="card-text">T shirt One</p>
                    <form  class="form">
                        <input type="hidden" value="T-shirt001" name="id">
                        <input type="number" value="0" name="quantity" class="form-control mb-2" min="1" value="1" max="5">
                        <input type="hidden" value="" class="uid" name="uid">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="size">
                            <option selected>Open this select menu</option>
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                    </select>
                    <button type="submit" class="btn btn-primary mt-2 ">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="width: auto">
                <div class="card-body">
                    <h5 class="card-title">Item 2</h5>

                    <p class="card-text">T shirt two</p>
                    <form class="form">
                        <input type="hidden" value="T-shirt002" name="id" >
                        <input type="number" value="0" name="quantity" class="form-control mb-2" min="1" value="1" max="5">
                        <input type="hidden" value="" class="uid" name="uid">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="size">
                            <option selected>Open this select menu</option>
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                        </select>
                        <button type="submit" class="btn btn-primary mt-2 ">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="width: auto">
                <div class="card-body">
                    <h5 class="card-title">Item 3</h5>

                    <p class="card-text">T shirt Three</p>
                    <form class="form">
                        <input type="hidden" value="T-shirt003" name="id">
                        <input type="number" value="0" name="quantity" class="form-control mb-2" min="1" value="1" max="5">
                        <input type="hidden" value="" class="uid" name="uid">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="size">
                            <option selected>Open this select menu</option>
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                        </select>
                        <button type="submit" class="btn btn-primary mt-2 ">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="../client/js/captureHandler.js"></script>
<script type="module" src="../client/js/uidAssign.js"></script>
</body>
</html>