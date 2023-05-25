<?php
//Se incluyen los archivos connect.php y header.php
include 'header.php';

if (isset($_POST["login_user_with_product"])) {
	$product_list = $_POST["product_id"];
	$json_e = json_encode($product_list);
	setcookie("product_list",$json_e,strtotime("+1 day"),"/","","",TRUE);
}
?>
<div class="ini">
<img src="img/ini_.png">
        <h2>INICIO DE SESION</h2>
        <br>
        <hr>
        <br>
    <form id="login" onsubmit="return false">
        <label>Usuario o Correo electrónico:</label><br>
        <input type="text" name="email" placeholder="Introduzca correo electrónico" /><br>
        <br>
        <label>Contraseña:</label><br>
        <input type="password" name="contra" placeholder="Introduzca su contraseña" /><br>
        <br>
        <input type="submit" class="boton" name="iniciar" value="Iniciar Sesión" /><br>
        <br>
        <label>¿No te has registrado todavía? Regístrtate con el siguiente botón.</label>
        <input type="submit" class="boton" name="registro" value="Registrarme" formaction="signup.php" />
    </form>
</div>
<?php
include 'footer.php';
?>