<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


?>
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
        h1 {
            text-align: center;
            margin: 1rem;
        }

        .button-box {
            text-align: center;
            margin: 0 auto;
            padding: 1rem;
        }
    </style>
</head>
<body>
<h1> List of items </h1>
<div class="button-box">
    <form action="./server/insert.php" method="post">
        <input type="hidden" value="hello" name="test" class="link">
        <button type="submit" class="btn btn-primary" id="send"> Send to Server</button>
    </form>

</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#id</th>
        <th scope="col">size</th>
        <th scope="col">quantity</th>
        <th scope="col">delete</th>

    </tr>
    </thead>

    <tbody id="tableBody">

    </tbody>
</table>
<script src="../client/js/renderRecords.js"></script>
<script src="sendRecords.js"></script>
</body>
</html>