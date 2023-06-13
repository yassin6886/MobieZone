<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**Inicio de sesion */
session_start();
/**Obtienen ip del cliente */
$ip_add = getenv("REMOTE_ADDR");
/**incluye conxion */
include "connect.php";
/**Muestra las categorias de la pagina */
if (isset($_POST["category"])) {
	$category_query = "SELECT * FROM categories";

	$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));
	echo "
            <div class='aside'>
				<h3 class='aside-title'>Mostrar Todo</h3>				
	";
	if (mysqli_num_rows($run_query) > 0) {
		$i = 1;
		while ($row = mysqli_fetch_array($run_query)) {

			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			$sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($query);
			$count = $row["count_items"];
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
} else if (isset($_POST["categoryM"])) {
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));
	echo "
            <div class='aside'>
				<h3 class='aside-title'>Mostrar Todo</h3>				
	";
	if (mysqli_num_rows($run_query) > 0) {
		$i = 1;
		while ($row = mysqli_fetch_array($run_query)) {

			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			$sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i AND subcategory = 'mobile'";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($query);
			$count = $row["count_items"];
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
} else if (isset($_POST["categoryT"])) {
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));
	echo "
		<div class='aside'>
			<h3 class='aside-title'>Mostrar Todo</h3>				
";
	if (mysqli_num_rows($run_query) > 0) {
		$i = 1;
		while ($row = mysqli_fetch_array($run_query)) {

			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			$sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i AND subcategory = 'tablet'";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($query);
			$count = $row["count_items"];
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
} else if (isset($_POST["categoryA"])) {
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));
	echo "
		<div class='aside'>
			<h3 class='aside-title'>Mostrar Todo</h3>				
";
	if (mysqli_num_rows($run_query) > 0) {
		$i = 1;
		while ($row = mysqli_fetch_array($run_query)) {

			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			$sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i AND subcategory = 'accesories'";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($query);
			$count = $row["count_items"];
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
if (isset($_POST["brand"])) {
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con, $brand_query);

	if (mysqli_num_rows($run_query) > 0) {
		$i = 1;
		while ($row = mysqli_fetch_array($run_query)) {

			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			$brand_image = $row["brand_image"];
			$sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($query);
			$count = $row["count_items"];
			$i++;
			echo "      
                    <div type='button' class='btn navbar-btn selectBrand' bid='$bid'>					
									<li><a href='store.php' onclick='recoger_marca($bid);'><img src='img/$brand_image'></a></li>
								</div>";
		}
	}
} else if (isset($_POST["brandM"])) {
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con, $brand_query);
	echo "
		<div class='aside'>
							<h3 class='aside-title'>Marcas</h3>
							<div class='btn-group-vertical'>
	";
	if (mysqli_num_rows($run_query) > 0) {
		$i = 1;
		while ($row = mysqli_fetch_array($run_query)) {

			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			$sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i AND subcategory='mobile'";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($query);
			$count = $row["count_items"];
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
} else if (isset($_POST["brandT"])) {
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con, $brand_query);
	echo "
		<div class='aside'>
							<h3 class='aside-title'>Marcas</h3>
							<div class='btn-group-vertical'>
	";
	if (mysqli_num_rows($run_query) > 0) {
		$i = 1;
		while ($row = mysqli_fetch_array($run_query)) {

			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			$sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i AND subcategory='tablet'";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($query);
			$count = $row["count_items"];
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
} else if (isset($_POST["brandA"])) {
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con, $brand_query);
	echo "
		<div class='aside'>
							<h3 class='aside-title'>Marcas</h3>
							<div class='btn-group-vertical'>
	";
	if (mysqli_num_rows($run_query) > 0) {
		$i = 1;
		while ($row = mysqli_fetch_array($run_query)) {

			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			$sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i AND subcategory='accesories'";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($query);
			$count = $row["count_items"];
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

if(isset($_POST['marca'])){
	$_SESSION['marca_sel'] = $_POST['marca'];
}

if (isset($_POST["page"])) {
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count / 9);
	for ($i = 1; $i <= $pageno; $i++) {
		echo "
			<li><a href='#product-row' page='$i' id='page' class='active'>$i</a></li>
		";
	}
}

if (isset($_POST["pageM"])) {
	$sql = "SELECT * FROM products WHERE subcategory = 'mobile'";
	$run_query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count / 9);
	for ($i = 1; $i <= $pageno; $i++) {
		echo "
			<li><a href='#product-row' page='$i' id='pageM' class='active'>$i</a></li>
		";
	}
}

if (isset($_POST["pageT"])) {
	$sql = "SELECT * FROM products WHERE subcategory = 'tablet'";
	$run_query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count / 9);
	for ($i = 1; $i <= $pageno; $i++) {
		echo "
			<li><a href='#product-row' page='$i' id='pageT' class='active'>$i</a></li>
		";
	}
}

if (isset($_POST["pageA"])) {
	$sql = "SELECT * FROM products WHERE subcategory = 'accesories'";
	$run_query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count / 9);
	for ($i = 1; $i <= $pageno; $i++) {
		echo "
			<li><a href='#product-row' page='$i' id='pageA' class='active'>$i</a></li>
		";
	}
}

if (isset($_POST["getProduct"])) {
	$limit = 9;
	if (isset($_POST["setPage"])) {
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	} else {
		$start = 0;
	}
	$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id LIMIT $start,$limit";
	$run_query = mysqli_query($con, $product_query);
	if (mysqli_num_rows($run_query) > 0) {
		while ($row = mysqli_fetch_array($run_query)) {
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_description = $row['product_desc'];

			$cat_name = $row["cat_title"];
			echo "
		<div class='card'>

  <div class='imgBox'>
  <a href='product.php?p=$pro_id'>
    <img src='img/product_images/$pro_image' class='mouse'>
	</a>
  </div>

  <div class='contentBox'>
    <h3>$pro_title</h3>
    <h2 class='price'>".$pro_price."€</h2>
    <a href='#' pid='$pro_id' id='product' class='buy'>Agregar</a>
  </div>

</div>
			";
		}
	}
}



if (isset($_POST["getProductM"])) {
	$limit = 9;
	if (isset($_POST["setPageM"])) {
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	} else {
		$start = 0;
	}
	$product_query = "SELECT * FROM products,categories WHERE subcategory='mobile' LIMIT $start,$limit";
	$run_query = mysqli_query($con, $product_query);
	if (mysqli_num_rows($run_query) > 0) {
		while ($row = mysqli_fetch_array($run_query)) {
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_description = $row['product_desc'];

			$cat_name = $row["cat_title"];
			echo "
			<div class='card'>

  <div class='imgBox'>
  <a href='product.php?p=$pro_id'>
    <img src='img/product_images/$pro_image' class='mouse'>
	</a>
  </div>

  <div class='contentBox'>
    <h3>$pro_title</h3>
    <h2 class='price'>".$pro_price."€</h2>
    <a href='#' pid='$pro_id' id='product' class='buy'>Agregar</a>
  </div>

</div>
                        
			";
		}
	}
}

if (isset($_POST["getProductT"])) {
	$limit = 9;
	if (isset($_POST["setPageT"])) {
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	} else {
		$start = 0;
	}
	$product_query = "SELECT * FROM products,categories WHERE subcategory='tablet' LIMIT $start,$limit";
	$run_query = mysqli_query($con, $product_query);
	if (mysqli_num_rows($run_query) > 0) {
		while ($row = mysqli_fetch_array($run_query)) {
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_description = $row['product_desc'];

			$cat_name = $row["cat_title"];
			echo "
			<div class='card'>

  <div class='imgBox'>
  <a href='product.php?p=$pro_id'>
    <img src='img/product_images/$pro_image' class='mouse'>
	</a>
  </div>

  <div class='contentBox'>
    <h3>$pro_title</h3>
    <h2 class='price'>".$pro_price."€</h2>
    <a href='#' pid='$pro_id' id='product' class='buy'>Agregar</a>
  </div>

</div>
                        
			";
		}
	}
}
if (isset($_POST["getProductA"])) {
	$limit = 9;
	if (isset($_POST["setPageA"])) {
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	} else {
		$start = 0;
	}
	$product_query = "SELECT * FROM products,categories WHERE subcategory='accesories' LIMIT $start,$limit";
	$run_query = mysqli_query($con, $product_query);
	if (mysqli_num_rows($run_query) > 0) {
		while ($row = mysqli_fetch_array($run_query)) {
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_description = $row['product_desc'];

			$cat_name = $row["cat_title"];
			echo "
			<div class='card'>

  <div class='imgBox'>
  <a href='product.php?p=$pro_id'>
    <img src='img/product_images/$pro_image' class='mouse'>
	</a>
  </div>

  <div class='contentBox'>
    <h3>$pro_title</h3>
    <h2 class='price'>".$pro_price."€</h2>
    <a href='#' pid='$pro_id' id='product' class='buy'>Agregar</a>
  </div>

</div>
                        
			";
		}
	}
}



if (
	isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"]) || isset($_POST["get_seleted_CategoryM"])
	|| isset($_POST["get_seleted_CategoryT"]) || isset($_POST["get_seleted_CategoryA"]) || isset($_POST["selectBrandM"]) || isset($_POST["selectBrandT"]) || isset($_POST["selectBrandT"])
	|| isset($_POST["selectBrandA"]) || isset($_POST["searchA"]) || isset($_POST["searchM"]) || isset($_POST["searchT"])
) {
	if (isset($_POST["get_seleted_Category"])) {
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id ORDER BY product_id ASC LIMIT 9";
	} else if (isset($_POST["selectBrand"])) {
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products,categories WHERE product_brand = '$id' AND product_cat=cat_id ORDER BY product_id ASC LIMIT 9";
	} else if (isset($_POST["get_seleted_CategoryM"])) {
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id AND subcategory = 'mobile' ORDER BY product_id ASC LIMIT 9";
	} else if (isset($_POST["get_seleted_CategoryT"])) {
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id AND subcategory = 'tablet' ORDER BY product_id ASC LIMIT 9";
	} else if (isset($_POST["get_seleted_CategoryA"])) {
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id AND subcategory = 'accesories' ORDER BY product_id ASC LIMIT 9";
	} else if (isset($_POST["selectBrandM"])) {
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products,categories WHERE product_brand = '$id' AND product_cat=cat_id AND subcategory = 'mobile' ORDER BY product_id ASC LIMIT 9";
	} else if (isset($_POST["selectBrandT"])) {
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products,categories WHERE product_brand = '$id' AND product_cat=cat_id AND subcategory = 'tablet' ORDER BY product_id ASC LIMIT 9";
	} else if (isset($_POST["selectBrandA"])) {
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products,categories WHERE product_brand = '$id' AND product_cat=cat_id AND subcategory = 'accesories' ORDER BY product_id ASC LIMIT 9";
	} else if (isset($_POST["search"])) {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_keywords LIKE '%$keyword%' OR product_title LIKE '%$keyword%'";
		//header('Location:header.php');       
	} else if (isset($_POST["searchA"])) {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products, categories WHERE product_cat = cat_id AND subcategory = 'accesories' AND (product_keywords LIKE '%$keyword%' OR product_title LIKE '%$keyword%')";
	} else if (isset($_POST["searchM"])) {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products, categories WHERE product_cat = cat_id AND subcategory = 'mobile' AND (product_keywords LIKE '%$keyword%' OR product_title LIKE '%$keyword%')";
	} else if (isset($_POST["searchT"])) {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products, categories WHERE product_cat = cat_id AND subcategory = 'tablet' AND (product_keywords LIKE '%$keyword%' OR product_title LIKE '%$keyword%')";
	}

	$run_query = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($run_query)) {
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
    <h2 class='price'>".$pro_price."€</h2>
    <a href='#' pid='$pro_id' id='product' class='buy'>Agregar</a>
  </div>

</div>";
		if (isset($_POST["search"])) {
			$searchResults[] = $row; // Agregar el resultado al array de resultados de búsqueda
		}
	}
	if (isset($_POST["search"])) {
		$_SESSION["search"] = $searchResults; // Almacenar los resultados de búsqueda en la sesión
	}
}



if (isset($_POST["addToCart"])) {
	$p_id = $_POST["proId"];
	if (isset($_POST["quantity"])) {
		$qty = $_POST["quantity"];
	} else {
		$qty = 0;
	}

	if (isset($_SESSION["uid"])) {
		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($run_query);

		if ($count > 0) {
			$row = mysqli_fetch_assoc($run_query);

			if ($qty > 0) {
				$qty += $row["qty"];
			} else {
				$qty = $row["qty"] + 1;
			}

			$update_sql = "UPDATE cart SET qty = $qty WHERE p_id = $p_id AND user_id = $user_id";
			mysqli_query($con, $update_sql);

			echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>La cantidad se ha actualizado..!</b>
					</div>
				";
		} else {
			if ($qty > 0) {
				//$qty += 1;
				$sql = "INSERT INTO `cart` (`p_id`, `ip_add`, `user_id`, `qty`) 
						VALUES ('$p_id','$ip_add','$user_id','$qty')";
				if (mysqli_query($con, $sql)) {
					echo "
						<div class='alert alert-success'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Producto Añadido..!</b>
						</div>
					";
				}
			} else {
				$sql = "INSERT INTO `cart` (`p_id`, `ip_add`, `user_id`, `qty`) 
						VALUES ('$p_id','$ip_add','$user_id','1')";
				if (mysqli_query($con, $sql)) {
					echo "
						<div class='alert alert-success'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Producto Añadido..!</b>
						</div>
					";
				}
			}
		}
	} else {
		$sql = "SELECT * FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
		$run_query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($run_query);

		if ($count > 0) {
			$row = mysqli_fetch_assoc($run_query);

			if ($qty > 0) {
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
						<b>La cantidad se ha actualizado..!</b>
					</div>
				";
		} else {
			if ($qty > 0) {
				//$qty += $row["qty"];
				$sql = "INSERT INTO `cart` (`p_id`, `ip_add`, `user_id`, `qty`) 
						VALUES ('$p_id', '$ip_add', '-1', '$qty')";
				mysqli_query($con, $sql);

				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Producto Añadido..!</b>
					</div>
				";
			} else {
				$sql = "INSERT INTO `cart` (`p_id`, `ip_add`, `user_id`, `qty`) 
						VALUES ('$p_id', '$ip_add', '-1', '1')";
				mysqli_query($con, $sql);

				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Producto Añadido..!</b>
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
		$sql = "SELECT SUM(qty) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	} else {
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT SUM(qty) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}

	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
function items()
{

	global $con, $ip_add;
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT SUM(qty) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	} else {
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT SUM(qty) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($query);
	return $row["count_item"];
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_desc,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	} else {
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_desc,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con, $sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n = 0;
			$total_price = 0;
			while ($row = mysqli_fetch_array($query)) {

				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				$total_price = $total_price + $product_price;
				echo '       
                    <div class="product-widget">
												<div class="product-img">
													<img src="img/product_images/' . $product_image . '" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">' . $product_title . '</a></h3>
													<h4 class="product-price"><span class="qty">' . $n . '</span>$' . $product_price . '</h4>
												</div>							
											</div>';
			}

			echo '<div class="cart-summary">
				    <small class="qty">' . $n . ' Item(s) selected</small>
				    <h5>' . $total_price . '€</h5>
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
			<form method="post" action="signin.php">
			
	               <table id="cart" class="table table-hover table-condensed" id="">
    				<thead>
						<tr>
							<th style="width:50%">Producto</th>
							<th style="width:10%">Precio</th>
							<th style="width:5%">Cantidad</th>
							<th style="width:15%" class="text-center">SubTotal</th>
							<th style="width:19%"></th>
						</tr>
					</thead>
					<tbody>
                    ';
			$n = 0;
			$totalT = 0;
			while ($row = mysqli_fetch_array($query)) {
				$ip_addr = $_SERVER['REMOTE_ADDR'];
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				$description = $row["product_desc"];
				$total = $qty * $product_price;
				$totalT += $total;

				echo
				'
                             
						<tr class="tr">
							<td data-th="Product" id="td">
								<div class="row" id="row">
								
									<div id="img" class="col-sm-5 "><img src="img/product_images/' . $product_image . '" style="height: 70px;width:75px;"/>
									<h4 id="pro" class="nomargin product-name header-cart-item-name"><a href="product.php?p=' . $product_id . '">' . $product_title . '</a></h4>
									</div>
									<div id="col" class="col-sm-8">
										<div id="desc" style="max-width=50px;">
										<p id="des" class="description-limit">' . $description . '</p>
										</div>
									</div>
									
									
								</div>
							</td>
							<input type="hidden" name="product_id[' . $n . ']" value="' . $product_id . '"/>
				            <input type="hidden" name="" value="' . $cart_item_id . '"/>
							<td id="pri' . $n . '" data-th="Price">' . $product_price . ' <small>€</small></td>
							<td id="quan" data-th="Quantity">
								<input id="qua' . $n . '" onchange="validar(' . $n . ');sum(' . $n . '); contar(); actualizar(' . $product_id . ', &apos;qua' . $n . '&apos;)" name="qty[' . $n . ']" type="number" min="1" class="form-control qty" value="' . $qty . '" >
							</td>
							<td id="sub' . $n . '" data-th="Subtotal" class="text-center total-producto">' . $total . ' <small>€</small></td>
							<td id="act" class="actions" data-th="">
							<div id="group" class="btn-group">								
								<a href="#" style="background-color:transparent;" id="rmv" class="btn btn-danger btn-sm remove" remove_id="' . $product_id . '"><ion-icon class="ionicon" name="trash-outline"></ion-icon></a>		
							</div>							
							</td>
						</tr>
					
                            
                            ';
			}
			$icono2 = '<ion-icon class="ionicon" name="arrow-back-outline"></ion-icon>';
			echo '</tbody>
			  
				<tfoot>
					
					<tr id="botonesAccion">
						<td style="border:0px;" id="contComp">
							
							' . $icono2 . '
							<input type="submit" formaction="index.php" id="cont" name="patras" class="btn btn-warning" value="Continuar Comprando">
							
						</td>
						<td style="border:0px;" colspan="2" id="tot" class="hidden-xs"></td>
						<td style="border:0px;" class="hidden-xs text-center"><b style="font-size: 14px; font-weight: bold;
						margin-right: 10px; margin-right: 0;" id="netT" >Total: ' . $totalT . ' €</b></td>
						<div id="issessionset"></div>
                        <td style="border:0px;" id="final">
							
							';
			if (!isset($_SESSION["uid"])) {
				$icono = '<ion-icon class="ionicon" name="bag-check-outline"></ion-icon>';
				echo '
					
					' . $icono . '
					<input type="submit" id="reg" name="comprar" class="btn btn-success" value="Finalizar Compra"/>
					
					</td>
						</tr>
					</tfoot>
				
							</table></div></div>';
			} else if (isset($_SESSION["uid"])) {
				//Paypal checkout form
				echo '
					</form>
					
						<form action="checkout.php" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="shoppingcart@gmail.com">
							<input type="hidden" name="upload" value="1">';

				$x = 0;
				$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
				$query = mysqli_query($con, $sql);
				while ($row = mysqli_fetch_array($query)) {
					$x++;
					echo

					'<input type="hidden" name="total_count" value="' . $x . '">
									<input type="hidden" name="item_name_' . $x . '" value="' . $row["product_title"] . '">
								  	 <input type="hidden" name="item_number_' . $x . '" value="' . $x . '">
								     <input type="hidden" name="amount_' . $x . '" value="' . $row["product_price"] . '">
								     <input type="hidden" name="quantity_' . $x . '" value="' . $row["qty"] . '">';
				}

				echo
				'<input type="hidden" name="return" value="http://localhost/myfiles/public_html/payment_success.php"/>
					                <input type="hidden" name="notify_url" value="http://localhost/myfiles/public_html/payment_success.php">
									<input type="hidden" name="cancel_return" value="http://localhost/myfiles/public_html/cancel.php"/>
									<input type="hidden" name="currency_code" value="USD"/>
									<input type="hidden" name="custom" value="' . $_SESSION["uid"] . '"/>
									<input type="submit" id="submit" name="login_user_with_product" name="submit" class="btn btn-success" value="Finalizar Compra">
									</form>
								</td>
									
							</tr>
									
							</tfoot>
									
						</table>
					</div>
				</div>    
				';
			}
		}
	}
}

if (isset($_POST['id']) && isset($_POST['cantidad'])) {
	$id_producto = $_POST["id"];
	$qty = $_POST["cantidad"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = $id_producto AND user_id = " . $_SESSION["uid"];
		mysqli_query($con, $sql);
	} else {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = $id_producto AND ip_add = '$ip_add' AND user_id = -1";
		mysqli_query($con, $sql);
	}
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	} else {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if (mysqli_query($con, $sql)) {
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}




if(isset($_POST["review"])){
    $limit = 3;
	if (isset($_POST["setPageR"])) {
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	} else {
		$start = 0;
	}

/**media de estrellas */

	$summaryQuery = "SELECT COUNT(review.review) AS review_count, AVG(review.star) AS star_average
	FROM user_info, review
	WHERE review.product_id = " . $_POST['pid'] . "
	AND user_info.user_id = review.user_id";

$summaryResult = mysqli_query($con, $summaryQuery) or die("Consulta incorrecta: " . mysqli_error($con));

if ($summaryRow = mysqli_fetch_assoc($summaryResult)) {
    $reviewCount = $summaryRow['review_count'];
    $starAverage = $summaryRow['star_average'];
	if($starAverage > 0){
	$starAverage = number_format($summaryRow['star_average'], 1);
	}else{
		$starAverage = '0.0';
	}
}

echo '<div class="reviews">
<div class="review-summary">
	<div class="stars-summary">
		<span class="star-count" style="font-size:40px;">'.$starAverage.'</span>
		<div class="star-rating">';
		
		echo '<div class="product-review-stars">';
		if ($starAverage >= 0 && $starAverage < 1) {
			echo '<input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label for="" title="Increible!">★</label>';
			echo '<input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label for="" title="Muy bien">★</label>';
			echo '<input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label for="" title="Meh">★</label>';
			echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label for="" title="Malo">★</label>';
			echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label for=""  title="Muy Malo">★</label>';
		}else if ($starAverage >= 1 && $starAverage < 2) {
			echo '<input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label for="" title="Increible!">★</label>';
			echo '<input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label for="" title="Muy bien">★</label>';
			echo '<input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label for="" title="Meh">★</label>';
			echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label for="" title="Malo">★</label>';
			echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label style="color:#d35400;"  title="Muy Malo">★</label>';
		} else if ($starAverage >= 2 && $starAverage < 3) {
			echo '<input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label for="" title="Increible!">★</label>';
			echo '<input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label for="" title="Muy bien">★</label>';
			echo '<input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label for="" title="Meh">★</label>';
			echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label style="color:#e74c3c;" title="Malo">★</label>';
			echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label style="color:#e74c3c;"  title="Muy Malo">★</label>';
		} else if ($starAverage >= 3 && $starAverage < 4) {
			echo '<input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label for="" title="Increible!">★</label>';
			echo '<input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label for="" title="Muy bien">★</label>';
			echo '<input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label style="color:#F39C12;" title="Meh">★</label>';
			echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label style="color:#F39C12;" title="Malo">★</label>';
			echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label style="color:#F39C12;"  title="Muy Malo">★</label>';
		} else if ($starAverage >= 4 && $starAverage < 5) {
			echo '<input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label for="" title="Increible!">★</label>';
			echo '<input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label style="color:#f1c40f;"  title="Muy bien">★</label>';
			echo '<input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label style="color:#f1c40f;"  title="Meh">★</label>';
			echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label style="color:#f1c40f;" title="Malo">★</label>';
			echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label style="color:#f1c40f;"  title="Muy Malo">★</label>';
		} else if ($starAverage == 5) {
			echo '<input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label style="color:#2ecc71;"  title="Increible!">★</label>';
			echo '<input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label style="color:#2ecc71;"  title="Muy bien">★</label>';
			echo '<input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label style="color:#2ecc71;"  title="Meh">★</label>';
			echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label style="color:#2ecc71;" title="Malo">★</label>';
			echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label style="color:#2ecc71;"  title="Muy Malo">★</label>';
		}
		echo '</span>
		</div>

	</div>
	</div>
	<div class="review-count">
		<span class="count">'.$reviewCount.'</span>
		<span class="text">Reseñas</span>
	</div>
</div>';


/***Mostrar reseñas */

    $result = mysqli_query($con, "SELECT user_info.first_name, review.review, review.star, review.date, review.response
        FROM user_info, review 
        WHERE review.product_id = " . $_POST['pid'] . " 
        AND user_info.user_id = review.user_id LIMIT $start,$limit") or die("query 1 incorrect....." . mysqli_error($con));

		while(list($name, $review, $rating, $date,$response)=mysqli_fetch_array($result))
        {			
			echo '
			<div class="review-list">
				<!-- Aquí puedes agregar las reseñas de los usuarios -->
				<div class="review-item">
					<div class="review-header">
						<div class="review-info">
							<span class="name">'.$name.'</span>
							<span class="date">'.$date.'</span>
						</div>
						<div class="review-rating">
							<span class="star-rating">

							';
            echo '<div class="product-review-stars">';
            if ($rating == 1) {
                echo '<input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label for="" title="Increible!">★</label>';
                echo '<input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label for="" title="Muy bien">★</label>';
                echo '<input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label for="" title="Meh">★</label>';
                echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label for="" title="Malo">★</label>';
                echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label style="color:#d35400;"  title="Muy Malo">★</label>';
            } else if ($rating == 2) {
                echo '<input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label for="" title="Increible!">★</label>';
                echo '<input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label for="" title="Muy bien">★</label>';
                echo '<input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label for="" title="Meh">★</label>';
                echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label style="color:#e74c3c;" title="Malo">★</label>';
                echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label style="color:#e74c3c;"  title="Muy Malo">★</label>';
            } else if ($rating == 3) {
                echo '<input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label for="" title="Increible!">★</label>';
                echo '<input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label for="" title="Muy bien">★</label>';
                echo '<input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label style="color:#F39C12;" title="Meh">★</label>';
                echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label style="color:#F39C12;" title="Malo">★</label>';
                echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label style="color:#F39C12;"  title="Muy Malo">★</label>';
            } else if ($rating == 4) {
                echo '<input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label for="" title="Increible!">★</label>';
                echo '<input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label style="color:#f1c40f;"  title="Muy bien">★</label>';
                echo '<input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label style="color:#f1c40f;"  title="Meh">★</label>';
                echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label style="color:#f1c40f;" title="Malo">★</label>';
                echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label style="color:#f1c40f;"  title="Muy Malo">★</label>';
            } else if ($rating == 5) {
                echo '<input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label style="color:#2ecc71;"  title="Increible!">★</label>';
                echo '<input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label style="color:#2ecc71;"  title="Muy bien">★</label>';
                echo '<input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label style="color:#2ecc71;"  title="Meh">★</label>';
                echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label style="color:#2ecc71;" title="Malo">★</label>';
                echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label style="color:#2ecc71;"  title="Muy Malo">★</label>';
            }
            echo '</span>
			</div>
		</div>
		<div class="review-content">
			<p>'.$review.'</p>';
			if($response != ''){
				$response = $response;
				echo '
			<span style="margin-left:30px;" class="name">Respuestad de: admin</span>
			<p style="margin-left:50px">'.$response.'</p>';
			}
			echo '
		</div>
	</div>';           
        }

}




if (isset($_POST["pageR"])) {
	$sql = "SELECT user_info.first_name, review.review, review.star, review.date 
    FROM user_info, review 
    WHERE review.product_id = " . $_POST['pid'] . " 
    AND user_info.user_id = review.user_id ";
	$run_query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count / 3);
	for ($i = 1; $i <= $pageno; $i++) {
		echo "
			<li><a href='#product-row' page='$i' id='pageR' class='active'>$i</a></li>
		";
	}
}


?>






