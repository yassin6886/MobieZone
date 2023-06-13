<?php
//Se incluyen los archivos connect.php y header.php
include 'header.php';

if (isset($_POST["login_user_with_product"])) {
	$product_list = $_POST["product_id"];
	$json_e = json_encode($product_list);
	setcookie("product_list",$json_e,strtotime("+1 day"),"/","","",TRUE);
}
?>



<!-- <div class="ini">
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
        <input type="submit" id="inicio"  class="boton" name="iniciar" value="Iniciar Sesión" /><br>
        <br>
        <label>¿No te has registrado todavía? Regístrtate con el siguiente botón.</label>
        <input type="submit" class="boton" id="registrarse" name="registro" value="Registrarme" formaction="signup.php" />
    </form>
</div> -->



<div class="containerform">
	<div class="screen">
		<div class="screen__content">	
			<form class="login" id="login" onsubmit="return validation()">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name="email" class="login__input" id="emailL" placeholder="Email">
                    <span style="color:red;" id="emailids" class="text-danger font-weight-regular"> </span>
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="contra" class="login__input" id="pass" placeholder="Contraseña">
                    <span style="color:red;" id="passwords" class="text-danger font-weight-regular">
				</div>
				<button class="button login__submit" id="inicio" name="iniciar" >
					<span class="button__text">Iniciar Sesion</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
				<div id="e_msg" class="margin:0;"></div>
			</form>
			<div class="social-login">
				<h3>Inicio Sesion</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>

<?php
include 'footer.php';
?>