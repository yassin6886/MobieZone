<?php
include 'header.php';
?>
<div class="main main-raised">
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<h1>Tienda</h1>
					<!-- aside Widget -->
					<div id="get_category">
					</div>
					<!-- /aside Widget -->
					<!-- <div id="get_brand">
				        </div> -->
					<!-- store products -->
					<div class="row" id="product-row">
						<div class="col-md-12 col-xs-12" id="product_msg">
						</div>
						<?php
						if (isset($_SESSION["search"])) {
							$rows = $_SESSION["search"];
							foreach ($rows as $row) {
								$pro_id    = $row['product_id'];
								$pro_cat   = $row['product_cat'];
								$pro_brand = $row['product_brand'];
								$pro_title = $row['product_title'];
								$pro_price = $row['product_price'];
								$pro_image = $row['product_image'];
								$cat_name = $row["cat_title"];
								$pro_description = $row["product_desc"];
								echo "
									<div class='card'>

										<div class='imgBox'>
										<a href='product.php?p=$pro_id'>
											<img src='img/product_images/$pro_image' class='mouse'>
											</a>
										</div>

										<div class='contentBox'>
											<h3>$pro_title</h3>
											<h2 class='price'>" . $pro_price . "€</h2>
											<a href='#' pid='$pro_id' id='product' class='buy'>Agregar</a>
										</div>

									</div>
								";
							}
							unset($_SESSION["search"]);
						}else if(isset($_SESSION['marca_sel'])) {
									$id_marca = $_SESSION['marca_sel'];
									$sql = "SELECT * FROM products WHERE product_brand = $id_marca ";
									$query = mysqli_query($con, $sql);
									while ($row = mysqli_fetch_array($query)) {
										$pro_id    = $row['product_id'];
										$pro_cat   = $row['product_cat'];
										$pro_brand = $row['product_brand'];
										$pro_title = $row['product_title'];
										$pro_price = $row['product_price'];
										$pro_image = $row['product_image'];
										//$cat_name = $row["cat_title"];
										$pro_description = $row["product_desc"];
										echo "
										<div class='card'>

											<div class='imgBox'>
												<a href='product.php?p=$pro_id'>
													<img src='img/product_images/$pro_image' class='mouse'>
												</a>
											</div>
										
											<div class='contentBox'>
												<h3>$pro_title</h3>
												<h2 class='price'>" . $pro_price . "€</h2>
												<a href='#' pid='$pro_id' id='product' class='buy'>Agregar</a>
											</div>
									
										</div>
										";
									}
									unset($_SESSION['marca_sel']);
									
								}else{
								?>
						<div id="get_product">
							<!--Here we get product jquery Ajax Request-->
						</div>
						<?php } ?>
						<!-- /product -->
					</div>
					<!-- /store products -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						<span class="store-qty">Showing 20-100 products</span>
						<ul class="store-pagination" id="pageno">
							<li><a class="active" href="#aside">1</a></li>

							<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
						</ul>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /STORE -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
</div>
<?php
include 'footer.php';
