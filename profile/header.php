<?php
include 'db.php';
include "../action.php";
?>
<!Doctype html>
<html>

<head>
  <title>Venta de móviles - Tienda Online</title>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <!--estilos-->

  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/form.css">
  <link rel="stylesheet" type="text/css" href="../css/carrito.css">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  

    <!--iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!--FUENTES-->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <!--profile.php-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">

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
        <li><a href="../index.php"><img src="../img/logo_.png"></a></li>
        <li class="li-productos">
          <a href="#"><ion-icon class="ionicon" name="filter-outline"></ion-icon>Productos</a>
          <ul class="children" id="get_brand">
          </ul>
        </li>
        <div class="dropdownn li-dropdown3">
            <a href="#" class="dropdownn"><ion-icon class="ionicon" name="storefront-outline"></ion-icon>Tienda</a>
            <div class="dropdownn-content">
              <a href="../mobile.php"><ion-icon class="ionicon" name="phone-portrait-outline"></ion-icon>Moviles</a>
              <a href="../tablet.php"><ion-icon class="ionicon" name="tablet-portrait-outline"></ion-icon>Tablets</a>
              <a href="../accesories.php"><ion-icon class="ionicon" name="headset-outline"></ion-icon>Accesorios</a>
            </div>
          </div>
        <li class="li-buscar">
          <form>
            <input class="input" type="text" placeholder="Buscar..." id="search">
            <button type="submit" id="search_btn" class="search-btn">Buscar</button>
          </form>
        </li>

        <li class="li-carrito"><a href="../carrito.php"><ion-icon class="ionicon" name="cart-outline"></ion-icon>Carrito <small id="contarp">(<?PHP echo items();?> )</small></a></li>
        <?php if ((!isset($_SESSION['uid'])) && (!isset($_SESSION['name']))) {?>
          <div class="dropdownn li-dropdown">
            <a href="#" class="dropdownn"><ion-icon class="ionicon" name="person-outline"></ion-icon>Acceder</a>
              <div class="dropdownn-content">
                <a href="../signin.php"><ion-icon class="ionicon" name="log-in-outline"></ion-icon>Iniciar Sesion</a>
                <a href="s../ignup.php"><ion-icon class="ionicon" name="clipboard-outline"></ion-icon>Registrarse</a>
              </div>
          </div>
        <?php }else{ 
          if ($_SESSION['name'] == 'admin'){?>
          <div class="dropdownn li-dropdown">
            <a href="#" class="dropdownn"><ion-icon class="ionicon" name="person-outline"></ion-icon>Hola <?php echo $_SESSION['name']?></a>
              <div class="dropdownn-content">
                <a href="profile.php"><ion-icon class="ionicon" name="person-circle-outline"></ion-icon>Mi Perfil</a>
                <a href="../admin/index.php"><ion-icon class="ionicon" name="lock-closed-outline"></ion-icon>Administrador</a>
                <a href="cerrar_sesion.php"><ion-icon class="ionicon" name="log-out-outline"></ion-icon>Cerrar Sesion</a>
              </div>
          </div>
          <?php }else{
            ?>
            <div class="dropdownn li-dropdown">
            <a href="#" class="dropdownn"><ion-icon class="ionicon" name="person-outline"></ion-icon>Hola <?php echo $_SESSION['name']?></a>
              <div class="dropdownn-content">
                <a href="profile.php"><ion-icon class="ionicon" name="person-circle-outline"></ion-icon>Mi Perfil</a>
                <a href="cerrar_sesion.php"><ion-icon class="ionicon" name="log-out-outline"></ion-icon>Cerrar Sesion</a>
              </div>
          </div>
            <?php
          }
        } ?>
      </ul>
    </nav>
  </header>
  <nav role="navigation" class="nav">
    <ul class="nav-items">
        <li class="nav-item">
            <a href="profile.php" class="nav-link"><span>Perfil</span></a>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link"><span>Informacion</span></a>
            <nav class="submenu">
                <ul class="submenu-items">
                    <li class="submenu-item"><a href="#" class="submenu-link" onclick="redireccionar('credit_card.php')">Informacion de pago</a></li>
                    <li class="submenu-item"><hr class="submenu-seperator" /></li>
                    <li class="submenu-item"><a href="#" class="submenu-link" onclick="redireccionar('transaction.php')">Mis Compras</a></li>
                </ul>
            </nav>
        </li>  
        <li class="nav-item dropdown">
            <a href="#" class="nav-link"><span>Mas</span></a>
            <nav class="submenu">
                <ul class="submenu-items">
                    <li class="submenu-item"><a href="#" class="submenu-link" onclick="redireccionar('contactUs.php')">Contactanos</a></li>
                    <li class="submenu-item"><hr class="submenu-seperator" /></li>
                    <li class="submenu-item"><a href="#" class="submenu-link" onclick="redireccionar('cust_pwd.php')">Cambiar Contraseña</a></li>
                    <li class="submenu-item"><hr class="submenu-seperator" /></li>
                    <li class="submenu-item"><a href="#" class="submenu-link" onclick="redireccionar('cerrar_sesion.php')">Cerrar Sesion</a></li>
                </ul>
            </nav>
        </li>  
    </ul>
</nav>