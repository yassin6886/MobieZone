<?php
include "connect.php";

include "header.php";


                         
?>

<head>
	<link rel="stylesheet" href="css/checkout.css">
</head>			
<section class="section">       
	<div class="container-fluid">
		<div class="row-checkout">
		<?php
		if(isset($_SESSION["uid"])){
			$sql = "SELECT * FROM user_info WHERE user_id='$_SESSION[uid]'";
			$query = mysqli_query($con,$sql);
			$row=mysqli_fetch_array($query);
			$sql2 = "SELECT * FROM cards WHERE user_id='$_SESSION[uid]'";
			$query2 = mysqli_query($con,$sql2);
			$count = mysqli_num_rows($query2);

			if($count == 1){
				$row2=mysqli_fetch_array($query2);
			if(strlen($row2['expdate']) == 5){
				$month = substr($row2['expdate'], 0, 1); // El primer número
				$year = substr($row2['expdate'], -2); // Los cuatro últimos números
				} else if(strlen($row2['expdate']) == 6){
				$month = substr($row2['expdate'], 0, 2); // Los dos primeros números
				$year = substr($row2['expdate'], -2); // Los cuatro últimos números
				} else {
				// El número no tiene 5 o 6 cifras
				}
			}else{
				$month = "";
				$year = "";
			}
?>
			<div class="col-75">
				<div class="container-checkout">
				<form id="checkout_form" action="checkout_process.php" method="POST" class="was-validated">

					<div class="row-checkout">
					
					<div class="col-50">
						<h3><i class="fa-regular fa-map" ></i> Direccion de Envio</h3>
						<label for="fname"><i class="fa fa-user" ></i> Nombre Completo</label>
						<input type="text" id="fname" class="form-control" name="firstname" pattern="^[a-zA-Z ]+$"  value="<?php if($row["first_name"] != ''){echo $row["first_name"];}else if($row["first_name"] != '' && $row['last_name'] != ''){echo $row["first_name"] .' '. $row["last_name"];} ?>">
						<label for="email"><i class="fa fa-envelope"></i> Email</label>
						<input type="text" id="email" name="email" class="form-control" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$" value="<?php echo $row["email"]; ?>" required>
						<label for="adr"><i class="fa fa-address-card"></i> Direccion</label>
						<input type="text" id="adr" name="address" class="form-control" value="<?php if($row["address1"]){echo $row["address1"];} ?>" required>
						<label for="city"><i class="fa-solid fa-city"></i> Ciudad</label>
						<input type="text" id="city" name="city" class="form-control" value="<?php if($row["city"]){echo $row["city"];} ?>" pattern="^[a-zA-Z ]+$" required>

						<div class="row">
						<div class="col-50">
							<label for="state">Comunidad</label>
							<input type="text" id="state" name="state" class="form-control" pattern="^[a-zA-Z ]+$" value="<?php if($row["state"]){echo $row["state"];} ?>" required>
						</div>
						<div class="col-50">
							<label for="zip">Codigo Postal</label>
							<input type="text" id="zip" name="zip" class="form-control" pattern="^[0-9]{5}(?:-[0-9]{4})?$" value="<?php if($row["zip"]){echo $row["zip"];} ?>" required>
						</div>
						</div>
					</div>
					
					
					<div class="col-50">
						<h3><i class="fa-solid fa-wallet" style="margin-right:5px;"></i>Pago</h3>
						<label for="fname"><i class="fa-regular fa-credit-card"></i> Tarjetas Aceptadas</label>
						<div class="icon-container">
						<i class="fa-brands fa-cc-visa"></i>
						<i class="fa-brands fa-cc-mastercard"></i>
						<i class="fa-brands fa-cc-paypal"></i>
						<i class="fa-brands fa-cc-discover"></i>
						</div>
						
						
						<label for="cname">Nombre de la Tarjeta</label>
						<input type="text" value="<?php if($count == 1){echo $row2["cardname"];} else{}?>" id="cname" name="cardname" class="form-control" pattern="^[a-zA-Z ]+$" required>
						
						<div class="form-group" id="card-number-field">
                        <label for="cardNumber">Numero de Tarjeta</label>
                        <input type="text" value="<?php if($count == 1){echo $row2["cardnumber"];} else{}?>"  class="form-control" id="cardNumber" name="cardNumber" required>
                    </div>
						<label for="expdate">Fecha de Expedicion</label>
						<input type="text" value="<?php if($count == 1){echo $month.'/'.$year;} else{}?>"  id="expdate" name="expdate" class="form-control" pattern="^((0[1-9])|(1[0-2]))\/(\d{2})$" placeholder="12/22"required>
						

						<div class="row">
						
						<div class="col-50">
							<div class="form-group CVV">
								<label for="cvv">CVV</label>
								<input type="text" value="<?php if($count == 1){echo $row2["cvv"];} else{}?>"  class="form-control" name="cvv" id="cvv" required>
						</div>
						</div>
					</div>
					</div>
					</div>
					<label><input type="CHECKBOX" name="q" class="roomselect" value="conform" required> Direccion de envio igual que facturacion
					</label>
					<?php
					$i=1;
					$total=0;
					$total_count=$_POST['total_count'];
					while($i<=$total_count){
						$item_name_ = $_POST['item_name_'.$i];
						$amount_ = $_POST['amount_'.$i];
						$quantity_ = $_POST['quantity_'.$i];
						$total=$total+$amount_ ;
						$sql = "SELECT product_id FROM products WHERE product_title='$item_name_'";
						$query = mysqli_query($con,$sql);
						$row=mysqli_fetch_array($query);
						$product_id=$row["product_id"];
						echo "	
						<input type='hidden' name='prod_id_$i' value='$product_id'>
						<input type='hidden' name='prod_price_$i' value='$amount_'>
						<input type='hidden' name='prod_qty_$i' value='$quantity_'>
						";
						$i++;
					}
					
				echo'	
				<input type="hidden" name="total_count" value="'.$total_count.'">
					<input type="hidden" name="total_price" value="'.$total.'">
					
					<input type="submit" id="submit" value="Continuar la compra" class="checkout-btn">
				</form>
				</div>
			</div>
			';
		}else{
			echo"<script>window.location.href = 'carrito.php'</script>";
		}
		?>

			<div class="col-25">
				<div class="container-checkout">
				
				<?php
				if (isset($_POST["cmd"])) {
				
					$user_id = $_POST['custom'];
					
					
					$i=1;
					echo
					"
					<h4>Carrito 
					<span class='price' style='color:black'>
					<i class='fa fa-shopping-cart'></i> 
					<b>$total_count</b>
					</span>
				</h4>

					<table class='table table-condensed'>
					<thead><tr>
					<th >Num</th>
					<th >Producto</th>
					<th >Cantidad</th>
					<th >Precio</th></tr>
					</thead>
					<tbody>
					";
					$total=0;
					while($i<=$total_count){
						$item_name_ = $_POST['item_name_'.$i];
						
						$item_number_ = $_POST['item_number_'.$i];
						
						$amount_ = $_POST['amount_'.$i];
						
						$quantity_ = $_POST['quantity_'.$i];
						$total=$total+$amount_ ;
						$sql = "SELECT product_id FROM products WHERE product_title='$item_name_'";
						$query = mysqli_query($con,$sql);
						$row=mysqli_fetch_array($query);
						$product_id=$row["product_id"];
					
						echo "	

						<tr><td><p>$item_number_</p></td><td><p>$item_name_</p></td><td ><p>$quantity_</p></td><td ><p>".$amount_."€</p></td></tr>";
						
						$i++;
					}

				echo"

				</tbody>
				</table>
				<hr>
				
				<h3>Total:<span class='price' style='color:black'><b>".$total."€</b></span></h3>";
					
				}
				?>
				</div>
			</div>
		</div>
	</div>
</section>
<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		
<?php
include "footer.php";
?>