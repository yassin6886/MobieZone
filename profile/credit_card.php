<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Formulario de Tarjeta de Crédito Dinámico</title>
	<link href="https://fonts.googleapis.com/css?family=Lato|Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/estilos.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php
include 'db.php';
include("header.php");

if(isset($_SESSION['uid']) && $_SESSION['name']){
	$id = $_SESSION['uid'];

	$sql = "SELECT * FROM cards WHERE user_id = '$id'";
	$resultado = mysqli_query($con, $sql);
	if(mysqli_num_rows($resultado) == 0){
?>

	<div class="contenedor">

		<!-- Tarjeta -->
		<section class="tarjeta" id="tarjeta">
			<div class="delantera">
				<div class="logo-marca" id="logo-marca">
					<!-- <img src="img/logos/visa.png" alt=""> -->
				</div>
				<img src="img/chip-tarjeta.png" class="chip" alt="">
				<div class="datos">
					<div class="grupo" id="numero">
						<p class="label">Número Tarjeta</p>
						<p class="numero">#### #### #### ####</p>
					</div>
					<div class="flexbox">
						<div class="grupo" id="nombre">
							<p class="label">Nombre Tarjeta</p>
							<p class="nombre">TU NOMBRE</p>
						</div>

						<div class="grupo" id="expiracion">
							<p class="label">Expiracion</p>
							<p class="expiracion"><span class="mes">MM</span> / <span class="year">AA</span></p>
						</div>
					</div>
				</div>
			</div>

			<div class="trasera">
				<div class="barra-magnetica"></div>
				<div class="datos">
					<div class="grupo" id="firma">
						<p class="label">Firma</p>
						<div class="firma"><p></p></div>
					</div>
					<div class="grupo" id="ccv">
						<p class="label">CVV</p>
						<p class="ccv"></p>
					</div>
				</div>
				<p class="leyenda">Aqui se encuentran sus datos bancarios. En cualquier momento podran ser actualizados o eliminados, sus datos se encuentran protegidos.</p>
				<a href="#" class="link-banco">www.tubanco.com</a>
			</div>
		</section>

		<!-- Contenedor Boton Abrir Formulario -->
		<div class="contenedor-btn">
			<button class="btn-abrir-formulario" id="btn-abrir-formulario">
				<i class="fas fa-plus"></i>
			</button>
		</div>

		<!-- Formulario -->
		<form method="post" action="" id="formulario-tarjeta" class="formulario-tarjeta">
			<div class="grupo">
				<label for="inputNumero">Número Tarjeta</label>
				<input type="text" id="inputNumero" maxlength="19" autocomplete="off">
			</div>
			<div class="grupo">
				<label for="inputNombre">Nombre</label>
				<input type="text" id="inputNombre" maxlength="19" autocomplete="off">
			</div>
			<div class="flexbox">
				<div class="grupo expira">
					<label for="selectMes">Expiracion</label>
					<div class="flexbox">
						<div class="grupo-select">
							<select name="mes" id="selectMes">
								<option disabled selected>Mes</option>
							</select>
							<i class="fas fa-angle-down"></i>
						</div>
						<div class="grupo-select">
							<select name="year" id="selectYear">
								<option disabled selected>Año</option>
							</select>
							<i class="fas fa-angle-down"></i>
						</div>
					</div>
				</div>

				<div class="grupo ccv">
					<label for="inputCCV">CVV</label>
					<input type="text" id="inputCCV" maxlength="3">
				</div>
			</div>
			<button type="submit" class="btn-enviar" id="enviar">Enviar</button>
		</form>
	</div>


<?php
	}else{
		$row = mysqli_fetch_assoc($resultado);

		if(strlen($row['expdate']) == 5){
		$month = substr($row['expdate'], 0, 1); // El primer número
		$year = substr($row['expdate'], -4); // Los cuatro últimos números
		} else if(strlen($row['expdate']) == 6){
		$month = substr($row['expdate'], 0, 2); // Los dos primeros números
		$year = substr($row['expdate'], -4); // Los cuatro últimos números
		} else {
		// El número no tiene 5 o 6 cifras
		}

		//$month = substr($row['expdate'],0,2);
		//$year = substr($row['expdate'],-2);
		$year2 = substr($row['expdate'],-4);
?>
<div class="contenedor">

<!-- Tarjeta -->
<section class="tarjeta" id="tarjeta">
	<div class="delantera">
		<div class="logo-marca" id="logo-marca">
			<!-- <img src="img/logos/visa.png" alt=""> -->
		</div>
		<img src="img/chip-tarjeta.png" class="chip" alt="">
		<div class="datos">
			<div class="grupo" id="numero">
				<p class="label">Número Tarjeta</p>
				<p class="numero"><?php echo $row['cardnumber']; ?></p>
			</div>
			<div class="flexbox">
				<div class="grupo" id="nombre">
					<p class="label">Nombre Tarjeta</p>
					<p class="nombre"><?php echo $row['cardname']; ?></p>
				</div>

				<div class="grupo" id="expiracion">
					<p class="label">Expiracion</p>
					<p class="expiracion"><span class="mes"><?php echo $month; ?></span> / <span class="year"><?php echo $year; ?></span></p>
				</div>
			</div>
		</div>
	</div>

	<div class="trasera">
		<div class="barra-magnetica"></div>
		<div class="datos">
			<div class="grupo" id="firma">
				<p class="label">Firma</p>
				<div class="firma"><p><?php echo $row['cardname']; ?></p></div>
			</div>
			<div class="grupo" id="ccv">
				<p class="label">CVV</p>
				<p class="ccv"><?php echo $row['cvv']; ?></p>
			</div>
		</div>
		<p class="leyenda">Aqui se encuentran sus datos bancarios. En cualquier momento podran ser actualizados o eliminados, sus datos se encuentran protegidos.</p>
		<a href="#" class="link-banco">www.tubanco.com</a>
	</div>
</section>

<!-- Contenedor Boton Abrir Formulario -->
<div class="contenedor-btn">
	<button class="btn-abrir-formulario" id="btn-abrir-formulario">
		<i class="fas fa-plus"></i>
	</button>
</div>

		<form method="post" action="" id="formulario-tarjeta" class="formulario-tarjeta">
			<div class="grupo">
				<label for="inputNumero">Número Tarjeta</label>
				<input type="text" id="inputNumero" maxlength="19" autocomplete="off" value="<?php echo $row['cardnumber']; ?>">
			</div>
			<div class="grupo">
				<label for="inputNombre">Nombre</label>
				<input type="text" id="inputNombre" maxlength="19" autocomplete="off" value="<?php echo $row['cardname']; ?>">
			</div>
			<div class="flexbox">
				<div class="grupo expira">
					<label for="selectMes">Expiracion</label>
					<div class="flexbox">
						<div class="grupo-select">
							<select name="mes" id="selectMes">
								<option disabled selected><?php echo $month; ?></option>
							</select>
							<i class="fas fa-angle-down"></i>
						</div>
						<div class="grupo-select">
							<select name="year" id="selectYear">
								<option disabled selected value=""><?php echo $year2; ?></option>
							</select>
							<i class="fas fa-angle-down"></i>
						</div>
					</div>
				</div>

				<div class="grupo ccv">
					<label for="inputCCV">CVV</label>
					<input type="text" id="inputCCV" maxlength="3" value="<?php echo $row['cvv']; ?>">
				</div>
			</div>
			<button type="submit" class="btn-enviar" id="enviar">Enviar</button>
		</form>
	</div>


	<?php
	}
}
?>

<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
		<script src="js/main.js"></script>
		<script src="js/ajax.js"></script>
	</body>
	</html>

	<style>
		.header{
			height:70px;
		}
	</style>

	<?php
	include("footer.php");