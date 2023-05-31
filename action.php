<?php
/**Inicio de sesion */
session_start();
/**Obtienen ip del cliente */
$ip_add = getenv("REMOTE_ADDR");
/**incluye conxion */
include "connect.php";
/**Muestra las categorias de la pagina */
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
    
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
            <div class='aside'>
				<h3 class='aside-title'>Mostrar Todo</h3>				
	";
	if(mysqli_num_rows($run_query) > 0){
        $i=1;
		while($row = mysqli_fetch_array($run_query)){
            
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            $i++;    
            
			echo "
                    <div type='button' class='btn navbar-btn category' cid='$cid'>
						<a href='#' id='tod'>
							<span  ></span>
								$cat_name
							<small class='qty'>($count)</small>
						</a>
					</div>";
		}    
		echo "</div>";
	}
	/**Muestra las categorias de la pagina Mobile*/
}else if(isset($_POST["categoryM"])){
		$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
            <div class='aside'>
				<h3 class='aside-title'>Mostrar Todo</h3>				
	";
	if(mysqli_num_rows($run_query) > 0){
        $i=1;
		while($row = mysqli_fetch_array($run_query)){
            
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i AND subcategory = 'mobile'";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            $i++;    
            
			echo "
                    <div type='button' class='btn navbar-btn categoryM' cid='$cid'>
						<a href='#' id='tod'>
							<span  ></span>
							Moviles
							<small class='qty'>($count)</small>
						</a>
					</div>";
		}    
		echo "</div>";
}
/**Muestra las categorias de la pagina tablet */
}else if(isset($_POST["categoryT"])){
	$category_query = "SELECT * FROM categories";
$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
echo "
		<div class='aside'>
			<h3 class='aside-title'>Mostrar Todo</h3>				
";
if(mysqli_num_rows($run_query) > 0){
	$i=1;
	while($row = mysqli_fetch_array($run_query)){
		
		$cid = $row["cat_id"];
		$cat_name = $row["cat_title"];
		$sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i AND subcategory = 'tablet'";
		$query = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($query);
		$count=$row["count_items"];
		$i++;    
		
		echo "
				<div type='button' class='btn navbar-btn categoryT' cid='$cid'>
					<a href='#' id='tod'>
						<span  ></span>
							Tablets
						<small class='qty'>($count)</small>
					</a>
				</div>";
	}    
	echo "</div>";
}
/**Muestra las categorias de la pagina accesories*/
}else if(isset($_POST["categoryA"])){
	$category_query = "SELECT * FROM categories";
$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
echo "
		<div class='aside'>
			<h3 class='aside-title'>Mostrar Todo</h3>				
";
if(mysqli_num_rows($run_query) > 0){
	$i=1;
	while($row = mysqli_fetch_array($run_query)){
		
		$cid = $row["cat_id"];
		$cat_name = $row["cat_title"];
		$sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i AND subcategory = 'accesories'";
		$query = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($query);
		$count=$row["count_items"];
		$i++;    
		
		echo "
				<div type='button' class='btn navbar-btn categoryA' cid='$cid'>
					<a href='#' id='tod'>
						<span  ></span>
							Accesorios
						<small class='qty'>($count)</small>
					</a>
				</div>";
	}    
	echo "</div>";
}
}
/**Muestra las marca en la pagina */
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);

	if(mysqli_num_rows($run_query) > 0){
        $i=1;
		while($row = mysqli_fetch_array($run_query)){
            
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			$brand_image = $row["brand_image"];
            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            $i++;
			echo "      
                    <div type='button' class='btn navbar-btn selectBrand' bid='$bid'>					
									<li><a href='#' ' div='categ'><img src='img/$brand_image'></a></li>
								</div>";
		}
	}
}else if(isset($_POST["brandM"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='aside'>
							<h3 class='aside-title'>Marcas</h3>
							<div class='btn-group-vertical'>
	";
	if(mysqli_num_rows($run_query) > 0){
        $i=1;
		while($row = mysqli_fetch_array($run_query)){
            
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i AND subcategory='mobile'";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            $i++;
			echo "
                    <div type='button' class='btn navbar-btn selectBrandM' bid='$bid'>		
									<a href='#'>
										<span ></span>
										$brand_name
										<small >($count)</small>
									</a>
								</div>";
		}
		echo "</div>";
	}
}else if(isset($_POST["brandT"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='aside'>
							<h3 class='aside-title'>Marcas</h3>
							<div class='btn-group-vertical'>
	";
	if(mysqli_num_rows($run_query) > 0){
        $i=1;
		while($row = mysqli_fetch_array($run_query)){
            
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i AND subcategory='tablet'";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            $i++;
			echo "
                    <div type='button' class='btn navbar-btn selectBrandT' bid='$bid'>		
									<a href='#'>
										<span ></span>
										$brand_name
										<small >($count)</small>
									</a>
								</div>";
		}
		echo "</div>";
	}
}else if(isset($_POST["brandA"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='aside'>
							<h3 class='aside-title'>Marcas</h3>
							<div class='btn-group-vertical'>
	";
	if(mysqli_num_rows($run_query) > 0){
        $i=1;
		while($row = mysqli_fetch_array($run_query)){
            
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i AND subcategory='accesories'";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            $i++;
			echo "
                    <div type='button' class='btn navbar-btn selectBrandA' bid='$bid'>		
									<a href='#'>
										<span ></span>
										$brand_name
										<small >($count)</small>
									</a>
								</div>";
		}
		echo "</div>";
	}
}
if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#product-row' page='$i' id='page' class='active'>$i</a></li>
		";
	}
}

if(isset($_POST["pageM"])){
	$sql = "SELECT * FROM products WHERE subcategory = 'mobile'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#product-row' page='$i' id='pageM' class='active'>$i</a></li>
		";
	}
}

if(isset($_POST["pageT"])){
	$sql = "SELECT * FROM products WHERE subcategory = 'tablet'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#product-row' page='$i' id='pageT' class='active'>$i</a></li>
		";
	}
}

if(isset($_POST["pageA"])){
	$sql = "SELECT * FROM products WHERE subcategory = 'accesories'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#product-row' page='$i' id='pageA' class='active'>$i</a></li>
		";
	}
}

if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
            $pro_description = $row['product_desc'];

            $cat_name = $row["cat_title"];
			echo "
			<section class='product'>
			<a href='product.php?p=$pro_id'>
			<img src='img/product_images/$pro_image' alt='iPhone'>
			</a>
			<h2 class='title'>$pro_title</h2>
			<p class='description'>$pro_description</p>
			<p class='price'>$pro_price €</p>
			<button pid='$pro_id' id='product'>Agregar al carrito</button>
		</section>
                        
			";
		}
	}
}



if(isset($_POST["getProductM"])){
	$limit = 9;
	if(isset($_POST["setPageM"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products,categories WHERE subcategory='mobile' LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
            $pro_description = $row['product_desc'];

            $cat_name = $row["cat_title"];
			echo "
			<section class='product'>
			<a href='product.php?p=$pro_id'>
			<img src='img/product_images/$pro_image' alt='iPhone'>
			</a>
			<h2 class='title'>$pro_title</h2>
			<p class='description'>$pro_description</p>
			<p class='price'>$pro_price €</p>
			<button pid='$pro_id' id='product'>Agregar al carrito</button>
		</section>
                        
			";
		}
	}
}

if(isset($_POST["getProductT"])){
	$limit = 9;
	if(isset($_POST["setPageT"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products,categories WHERE subcategory='tablet' LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
            $pro_description = $row['product_desc'];

            $cat_name = $row["cat_title"];
			echo "
			<section class='product'>
			<a href='product.php?p=$pro_id'>
			<img src='img/product_images/$pro_image' alt='iPhone'>
			</a>
			<h2 class='title'>$pro_title</h2>
			<p class='description'>$pro_description</p>
			<p class='price'>$pro_price €</p>
			<button pid='$pro_id' id='product'>Agregar al carrito</button>
		</section>
                        
			";
		}
	}
}
if(isset($_POST["getProductA"])){
	$limit = 9;
	if(isset($_POST["setPageA"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products,categories WHERE subcategory='accesories' LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
            $pro_description = $row['product_desc'];

            $cat_name = $row["cat_title"];
			echo "
			<section class='product'>
			<a href='product.php?p=$pro_id'>
			<img src='img/product_images/$pro_image' alt='iPhone'>
			</a>
			<h2 class='title'>$pro_title</h2>
			<p class='description'>$pro_description</p>
			<p class='price'>$pro_price €</p>
			<button pid='$pro_id' id='product'>Agregar al carrito</button>
		</section>
                        
			";
		}
	}
}



if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"]) || isset($_POST["get_seleted_CategoryM"])
 || isset($_POST["get_seleted_CategoryT"]) || isset($_POST["get_seleted_CategoryA"]) || isset($_POST["selectBrandM"]) || isset($_POST["selectBrandT"]) || isset($_POST["selectBrandT"])
 || isset($_POST["selectBrandA"]) || isset($_POST["searchA"]) || isset($_POST["searchM"]) || isset($_POST["searchT"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id ORDER BY product_id ASC LIMIT 9";
        
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products,categories WHERE product_brand = '$id' AND product_cat=cat_id ORDER BY product_id ASC LIMIT 9";
	}else if (isset($_POST["get_seleted_CategoryM"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id AND subcategory = 'mobile' ORDER BY product_id ASC LIMIT 9";
	}else if(isset($_POST["get_seleted_CategoryT"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id AND subcategory = 'tablet' ORDER BY product_id ASC LIMIT 9";
	}else if(isset($_POST["get_seleted_CategoryA"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id AND subcategory = 'accesories' ORDER BY product_id ASC LIMIT 9";
	}else if(isset($_POST["selectBrandM"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products,categories WHERE product_brand = '$id' AND product_cat=cat_id AND subcategory = 'mobile' ORDER BY product_id ASC LIMIT 9";
	}else if(isset($_POST["selectBrandT"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products,categories WHERE product_brand = '$id' AND product_cat=cat_id AND subcategory = 'tablet' ORDER BY product_id ASC LIMIT 9";
	}else if(isset($_POST["selectBrandA"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products,categories WHERE product_brand = '$id' AND product_cat=cat_id AND subcategory = 'accesories' ORDER BY product_id ASC LIMIT 9";
	}else if(isset($_POST["search"])){
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_keywords LIKE '%$keyword%' OR product_title LIKE '%$keyword%'";      
	}else if(isset($_POST["searchA"])){
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products, categories WHERE product_cat = cat_id AND subcategory = 'accesories' AND (product_keywords LIKE '%$keyword%' OR product_title LIKE '%$keyword%')";      
	}else if(isset($_POST["searchM"])){
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products, categories WHERE product_cat = cat_id AND subcategory = 'mobile' AND (product_keywords LIKE '%$keyword%' OR product_title LIKE '%$keyword%')";      
	}else if(isset($_POST["searchT"])){
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products, categories WHERE product_cat = cat_id AND subcategory = 'tablet' AND (product_keywords LIKE '%$keyword%' OR product_title LIKE '%$keyword%')";      
	}

	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
		$pro_id    = $row['product_id'];
		$pro_cat   = $row['product_cat'];
		$pro_brand = $row['product_brand'];
		$pro_title = $row['product_title'];
		$pro_price = $row['product_price'];
		$pro_image = $row['product_image'];
		$cat_name = $row["cat_title"];
		$pro_description = $row["product_desc"];

		echo "
		<section class='product'>
		<a href='product.php?p=$pro_id'>
		<img src='img/product_images/$pro_image' alt='iPhone'>
		</a>
		<h2 class='title'>$pro_title</h2>
		<p class='description'>$pro_description</p>
		<p class='price'>$pro_price €</p>
		<button pid='$pro_id' id='product'>Agregar al carrito</button>
		</section>";
	}
	
}
	


	if(isset($_POST["addToCart"])) {
		$p_id = $_POST["proId"];
		if(isset($_POST["quantity"])){
			$qty = $_POST["quantity"];
		}else{
			$qty = 0;
		}
	
		if(isset($_SESSION["uid"])) {
			$user_id = $_SESSION["uid"];
	
			$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
			$run_query = mysqli_query($con, $sql);
			$count = mysqli_num_rows($run_query);
	
			if($count > 0) {
				$row = mysqli_fetch_assoc($run_query);
	
				if($qty > 0) {
					$qty += $row["qty"];
				} else {
					$qty = $row["qty"] + 1;
				}
	
				$update_sql = "UPDATE cart SET qty = $qty WHERE p_id = $p_id AND user_id = $user_id";
				mysqli_query($con, $update_sql);
	
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product quantity is updated..!</b>
					</div>
				";
			} else {
				if($qty > 0) {
					$qty += $row["qty"];
					$sql = "INSERT INTO `cart` (`p_id`, `ip_add`, `user_id`, `qty`) 
						VALUES ('$p_id','$ip_add','$user_id','$qty')";
				if(mysqli_query($con, $sql)) {
					echo "
						<div class='alert alert-success'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is Added..!</b>
						</div>
					";
				}
				} else {
					$sql = "INSERT INTO `cart` (`p_id`, `ip_add`, `user_id`, `qty`) 
						VALUES ('$p_id','$ip_add','$user_id','1')";
				if(mysqli_query($con, $sql)) {
					echo "
						<div class='alert alert-success'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is Added..!</b>
						</div>
					";
				}
				}	
			}
		} else {
			$sql = "SELECT * FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$run_query = mysqli_query($con, $sql);
			$count = mysqli_num_rows($run_query);
	
			if($count > 0) {
				$row = mysqli_fetch_assoc($run_query);
	
				if($qty > 0) {
					$qty += $row["qty"];
				} else {
					$qty = $row["qty"] + 1;
				}
	
				$user_id = -1;
				$update_sql = "UPDATE cart SET qty = $qty WHERE p_id = $p_id AND user_id = $user_id";
				mysqli_query($con, $update_sql);
	
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product quantity is updated..!</b>
					</div>
				";
			} else {
				if($qty > 0) {
					$qty += $row["qty"];
					$sql = "INSERT INTO `cart` (`p_id`, `ip_add`, `user_id`, `qty`) 
						VALUES ('$p_id', '$ip_add', '-1', '$qty')";
				mysqli_query($con, $sql);
	
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully..!</b>
					</div>
				";
				} else {
					$sql = "INSERT INTO `cart` (`p_id`, `ip_add`, `user_id`, `qty`) 
						VALUES ('$p_id', '$ip_add', '-1', '1')";
				mysqli_query($con, $sql);
	
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully..!</b>
					</div>
				";
				}	
			}
		}
	}
	

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_desc,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_desc,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			$total_price=0;
			while ($row=mysqli_fetch_array($query)) {
                
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				$total_price=$total_price+$product_price;
				echo '       
                    <div class="product-widget">
												<div class="product-img">
													<img src="img/product_images/'.$product_image.'" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">'.$product_title.'</a></h3>
													<h4 class="product-price"><span class="qty">'.$n.'</span>$'.$product_price.'</h4>
												</div>							
											</div>';
			}
            
            echo '<div class="cart-summary">
				    <small class="qty">'.$n.' Item(s) selected</small>
				    <h5>'.$total_price.'€</h5>
				</div>'
            ?>
				
				
			<?php
			
			exit();
		}
	}
	
    
    
    if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo '<div class="main ">
			<div class="table-responsive">
			<form method="post" action="login_form.php">
			
	               <table id="cart" class="table table-hover table-condensed" id="">
    				<thead>
						<tr>
							<th style="width:50%">Producto</th>
							<th style="width:10%">Precio</th>
							<th style="width:8%">Cantidad</th>
							<th style="width:7%" class="text-center">SubTotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
                    ';
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];
					$description = $row["product_desc"];

					echo 
						'
                             
						<tr class="tr">
							<td data-th="Product" id="td">
								<div class="row" id="row">
								
									<div id="img" class="col-sm-4 "><img src="img/product_images/'.$product_image.'" style="height: 70px;width:75px;"/>
									<h4 id="pro" class="nomargin product-name header-cart-item-name"><a href="product.php?p='.$product_id.'">'.$product_title.'</a></h4>
									</div>
									<div id="col" class="col-sm-6">
										<div id="desc" style="max-width=50px;">
										<p id="des" class="description-limit">'.$description.'</p>
										</div>
									</div>
									
									
								</div>
							</td>
                            <input type="hidden" name="product_id[]" value="'.$product_id.'"/>
				            <input type="hidden" name="" value="'.$cart_item_id.'"/>
							<td id="pri" data-th="Price"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></td>
							<td id="quan" data-th="Quantity">
								<input id="qua" type="text" class="form-control qty" value="'.$qty.'" >
							</td>
							<td id="sub" data-th="Subtotal" class="text-center"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></td>
							<td id="act" class="actions" data-th="">
							<div id="group" class="btn-group">
								<a href="#" id="upd" class="btn btn-info btn-sm update" update_id="'.$product_id.'"><ion-icon class="ionicon" name="refresh-outline"></ion-icon></a>
								
								<a href="#" id="rmv" class="btn btn-danger btn-sm remove" remove_id="'.$product_id.'"><ion-icon class="ionicon" name="trash-outline"></ion-icon></a>		
							</div>							
							</td>
						</tr>
					
                            
                            ';
				}
				
				echo '</tbody>
				<tfoot>
					
					<tr>
						<td><a id="cont" href="index.php" class="btn btn-warning"><ion-icon class="ionicon" name="arrow-back-outline"></ion-icon>Continuar Comprando</a></td>
						<td colspan="2" class="hidden-xs"></td>
						<td class="hidden-xs text-center"><b style="font-size: 14px; font-weight: bold;
						margin-right: 10px; margin-right: 0;" id="netT" class="net_total" ></b></td>
						<div id="issessionset"></div>
                        <td>
							
							';
				if (!isset($_SESSION["uid"])) {
					echo '
					
							<a id="reg" href="signup.php"  data-target="#Modal_register" class="btn btn-success"><ion-icon class="ionicon" name="bag-check-outline"></ion-icon>Finalizar Compra</a></td>
								</tr>
							</tfoot>
				
							</table></div></div>';
                }else if(isset($_SESSION["uid"])){
					//Paypal checkout form
					echo '
					</form>
					
						<form action="checkout.php" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="shoppingcart@puneeth.com">
							<input type="hidden" name="upload" value="1">';
							  
							$x=0;
							$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query)){
								$x++;
								echo  	

									'<input type="hidden" name="total_count" value="'.$x.'">
									<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
								}
							  
							echo   
								'<input type="hidden" name="return" value="http://localhost/myfiles/public_html/payment_success.php"/>
					                <input type="hidden" name="notify_url" value="http://localhost/myfiles/public_html/payment_success.php">
									<input type="hidden" name="cancel_return" value="http://localhost/myfiles/public_html/cancel.php"/>
									<input type="hidden" name="currency_code" value="USD"/>
									<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
									<input type="submit" id="submit" name="login_user_with_product" name="submit" class="btn btn-success" value="Finalizar Compra">
									</form></td>
									
									</tr>
									
									</tfoot>
									
							</table></div></div>    
								';
				}
			}
	}
	
	
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}




?>






