<?php

session_start();
if(isset($_SESSION['user'])){
    header("location:personnesList.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootswatch/dist/lux/bootstrap.css">
    <title><?php echo isset($pageTitle)? $pageTitle: 'Gl2' ?></title>
</head>
<body>
<div class="container">
    <?php
        if (isset($_SESSION['errorMessage'])) {

    ?>
            <div class="alert alert-danger">
                <?= $_SESSION['errorMessage'] ?>
            </div>
    <?php
            unset($_SESSION['errorMessage']);
        }
    ?>
    <form action="logining.php" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input
                type="email"
                name="email"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="sh@sh.sh">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input
                name="pwd"
                type="password"
                class="form-control"
                id="exampleInputPassword1"
                placeholder="slimihibilfoot">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
</body>
</html>