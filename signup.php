<?php

//Se incluyen los archivos connect.php y header.php
include 'connect.php';
include 'header.php';
?>

<!-- <div class="ini">
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
    <input type="submit" class="boton" name="Registrar" id="registrar" value="Resgistrarme" /><br>
    <br>
    <label>¿Ya estás registrado? Inicia sesión con el siguiente botón.</label>
    <br>
    <input type="submit" class="boton" name="" id="iniciar" value="Iniciar Sesión" formaction="signin.php" />
</form>
<div id="signup_msg">
                                    
</div>
</div> -->

<div class="containerform">
	<div class="screen">
		<div class="screen__content">
			<form class="login2" id="signup_form" onsubmit="return validation()">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name="rusuario" class="login__input" id="name" placeholder="Nombre">
                    <span style="color:red;" id="Name" class="text-danger font-weight-regular"> </span>
				</div>
                <div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name="remail" class="login__input" id="emails" placeholder="Email">
                    <span style="color:red;" id="emailids" class="text-danger font-weight-regular"> </span>
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="rcontra" class="login__input" id="pass" placeholder="Contraseña">
                    <span style="color:red;" id="passwords" class="text-danger font-weight-regular">
				</div>
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="repetircontra" class="login__input" id="conpass" placeholder="Repetir Contraseña">
                    <span style="color:red;" id="confrmpass" class="text-danger font-weight-regular">
				</div>
				<button class="button login__submit"  name="Registrar" id="registrar" >
					<span class="button__text">Registrarse</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>		
			</form>
            <div id="signup_msg"></div>
			<div class="social-login2">
				<h3>Registro</h3>
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