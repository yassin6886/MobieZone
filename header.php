<?php
include 'connect.php';
session_start();
?>
<!Doctype html>
<html>

<head>
  <title>Venta de móviles - Tienda Online</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <!--estilos-->
  <link rel="stylesheet" type="text/css" href="css/carrito.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">

    <!--iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
</head>

<body>
  <header>
  <div id="top-header">
      <div class="container">

        <ul class="header-links pull-left">
          <li><a href="#"><ion-icon class="ionicon" name="call-outline"></ion-icon> +34 910364872</a></li>
          <li><a href="#"><ion-icon class="ionicon" name="mail-unread-outline"></ion-icon> mobileZone@gmail.com</a></li>
          <li><a href="#"><ion-icon class="ionicon" name="location-outline"></ion-icon>España</a></li>
        </ul>
      </div>
  </div>  
    <nav>
      <ul>
        <li><a href="index.php">(logo)</a></li>
        <li class="submenu">
          <a href="#"><ion-icon class="ionicon" name="filter-outline"></ion-icon>Productos</a>
          <ul class="children" id="get_brand">

          </ul>
        </li>

        <li>
          <form>
            <input class="input" type="text" placeholder="Buscar..." id="search">
            <button type="submit" id="search_btn" class="search-btn">Buscar</button>
          </form>
        </li>

        <li><a href="carrito.php"><ion-icon class="ionicon" name="cart-outline"></ion-icon>Carrito</a></li>
        <?php if ((!isset($_SESSION['uid'])) && (!isset($_SESSION['name']))) {?>
          <div class="dropdownn">
            <a href="#" class="dropdownn"><ion-icon class="ionicon" name="person-outline"></ion-icon>Acceder</a>
              <div class="dropdownn-content">
                <a href="signin.php"><ion-icon class="ionicon" name="log-in-outline"></ion-icon>Iniciar Sesion</a>
                <a href="signup.php"><ion-icon class="ionicon" name="clipboard-outline"></ion-icon>Registrarse</a>
              </div>
          </div>
        <?php }else{ 
          if ($_SESSION['name'] == 'admin'){?>
          <div class="dropdownn">
            <a href="#" class="dropdownn"><ion-icon class="ionicon" name="person-outline"></ion-icon>Hola <?php echo $_SESSION['name']?></a>
              <div class="dropdownn-content">
                <a href="profile/profile.php"><ion-icon class="ionicon" name="settings-outline"></ion-icon>Configuracion</a>
                <a href="admin/index.php"><ion-icon class="ionicon" name="lock-closed-outline"></ion-icon>Administrador</a>
                <a href="_signout.php"><ion-icon class="ionicon" name="log-out-outline"></ion-icon>Cerrar Sesion</a>
              </div>
          </div>
          <?php }else{
            ?>
            <div class="dropdownn">
            <a href="#" class="dropdownn"><ion-icon class="ionicon" name="person-outline"></ion-icon>Hola <?php echo $_SESSION['name']?></a>
              <div class="dropdownn-content">
                <a href="profile/profile.php"><ion-icon class="ionicon" name="settings-outline"></ion-icon>Configuracion</a>
                <a href="_signout.php"><ion-icon class="ionicon" name="log-out-outline"></ion-icon>Cerrar Sesion</a>
              </div>
          </div>
            <?php
          }
        } ?>
      </ul>
    </nav>
  </header>

  <div id="content">