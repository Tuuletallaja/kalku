<?php //print_r($_SESSION); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://kalku.ta18aru.itmajakas.ee/style">
    <title>Document</title>
</head>
<body>
    <?php 
    if($_SESSION['is_logged_in'] === true) {
        echo "Tere, {$_SESSION['user']}!";
        echo '<br>';
        echo '<a href="/logout">Logi välja</a>';
    } else {
        echo '<a href="/login">Login</a>';   
    }
    ?>
    
    </li>
    <div class="container">
    <?php require('nav.php'); ?>