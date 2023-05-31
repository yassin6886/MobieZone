<?php
include 'barra.php';
?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="css/contactUs.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-left">
          <div class="screen-header-button close"></div>
          <div class="screen-header-button maximize"></div>
          <div class="screen-header-button minimize"></div>
        </div>
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title">
            <span>CONTACTA</span>
            <span>NOS</span>
          </div>
          <div id="response-msg"></div>
          <div class="app-contact">INFO CONTACTO: +34 910364872</div>
        </div>
        <div class="screen-body-item">
          <div class="app-form" id="contact-form">
            <div class="app-form-group">
              <input class="app-form-control" id="name" placeholder="NOMBRE" value="<?php echo $_SESSION["name"] ?>">
            </div>
            <div class="app-form-group">
              <input class="app-form-control" id="email" placeholder="EMAIL">
            </div>
            <div class="app-form-group">
              <input class="app-form-control" id="num" placeholder="NUMERO CONTACTO">
            </div>
            <div class="app-form-group message">
              <input class="app-form-control" id="mens" placeholder="MENSAJE">
            </div>
            <div class="app-form-group buttons">
              <button class="app-form-button" id="cancelarForm">CANCELAR</button>
              <button class="app-form-button" id="enviarForm">ENVIAR</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
<script src="js/ajax.js"></script>
</html>