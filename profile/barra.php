<?php
session_start();
    include("db.php");
    $cart=$con->query("SELECT count(*) from cart where cart.user_id = {$_SESSION['uid']};");
    $cartres=$cart->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/barra.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
      
    </head>
<body>

<div class="header">
  <div class="shimmer">
  <b style="font-size: 32px; line-height: 30px;"><span style="font-size:32px;" class="material-symbols-outlined">Person</span>Perfil</b>
  </div>
</div>

<div class="sidebar">
<nav class="navi">
  <ul style="margin-top: 0%; padding: 0; list-style-type: none;">

    <li id="home" onclick="location.replace('../index.php')"><span class="material-icons md-48 md-light">home</span></li>

    <!--<li id="search" onclick="location.replace('search.php')"><span class="material-icons md-48 md-light">search</span></li>-->
    
    <li id="store" onclick="location.replace('../store.php')"><span class="material-icons md-48 md-light">store</span></li>
    
    <li id="cart" onclick="location.replace('../carrito.php')"><span class="material-icons md-48 md-light" id="cart">shopping_cart
    
    <?php 
        if($cartres['count(*)'])
           echo "<div class='cart_badge'>{$cartres['count(*)']}</div>";
    ?>
    </span></li>

    <!--<li id="request" onclick="location.replace('cust_request.php')"><span class="material-icons md-48 md-light">recommend</span></li>-->

    <li id="transaction" onclick="location.replace('transaction.php')"><span class="material-icons md-48 md-light">paid</span></li>

    <li id="card" onclick="location.replace('credit_card.php')"><span class="material-icons md-48 md-light">credit_card</span></li>

    <li id="profile" onclick="location.replace('profile.php')"><span class="material-icons md-48 md-light">account_box</span></li>

    <li id="pwd" onclick="location.replace('cust_pwd.php')"><span class="material-icons md-48 md-light">lock</span></li>

    <li id="contactUS" onclick="location.replace('contactUs.php')"><span class="material-icons md-48 md-light">contact_support</span></li>

    <li onclick="location.replace('cerrar_sesion.php')"><span class="material-icons md-48 md-light">logout</span></li>


  </ul>
</nav>
</div>

<div class="within">
<br><br><br>