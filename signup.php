<?php

//Se incluyen los archivos connect.php y header.php
include 'connect.php';
include 'header.php';
?>

<div class="ini">
<img src="img/registrar.png">
        <h2>REGISTRO</h2>
        <br>
        <hr>
        <br>
<form id="signup_form" onsubmit="return false">
    <label>Nombre:</label><br>
    <input type="text" name="rusuario" placeholder="Introduzca un nombre de usuario" /><br>
    <br>
    <label>Apellido:</label><br>
    <input type="text" name="rapellido" placeholder="Introduzca un nombre de usuario" /><br>
    <br>
    <label>Correo electrónico:</label><br>
    <input type="email" name="remail" placeholder="Introduzca un correo electrónico" /><br>
    <br>
    <label>Contraseña:</label><br>
    <input type="password" name="rcontra" placeholder="Introduzca su contraseña" /><br>
    <br>
    <label>Repita la contraseña:</label><br>
    <input type="password" name="repetircontra" placeholder="Repita su contraseña" /><br>
    <br>
    <input type="submit" class="boton" name="Registrar" value="Resgistrarme" /><br>
    <br>
    <label>¿Ya estás registrado? Inicia sesión con el siguiente botón.</label>
    <br>
    <input type="submit" class="boton" name="" value="Iniciar Sesión" formaction="signin.php" />
</form>
<div id="signup_msg">
                                    
</div>
</div>
<?php
include 'footer.php';
?>