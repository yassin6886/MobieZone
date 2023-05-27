<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
<?php 
    include 'header.php';
    $product_id = $_GET['p'];
								
    $sql = " SELECT * FROM products ";
    $sql = " SELECT * FROM products WHERE product_id = $product_id";
    $pro_id = $product_id;
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) 
	{
		while($row = mysqli_fetch_assoc($result)) 
	    {
            ?>

            <div class="container2">
    <div class="row">
      <div class="col-lg-5 col-md-5">
        <div class="main-image"><img id="thumbnail" src="img/product_images/<?php echo $row['product_image'] ?>" alt=""> </div>
    <div class="pic-center"> <img onclick="change_image(this)" src="img/product_images/<?php echo $row['product_image'] ?>" > <img onclick="change_image(this)" src="img/product_images/<?php echo $row['product_image'] ?>"> </div>
      </div>
      <div class="col-lg-7 col-md-7">
        <div class="section-heading">
  <h2 class="title"><?php echo $row['product_title'] ?></h2>
          <h6 class="menuh6"><?php echo $row['product_price']?>€</h6>
        </div>
        <div class="section-body">
          <p><?php echo $row['product_desc'] ?></p>
          <div class="quantity">
      <input type="button" id="remove_0" onclick="CalculateTotal(this,0)" value="-" class="inp-pos">
      <input type="text" placeholder="1" name="quantity" id="quantity_0" onchange="CalculateTotal(this,0)" class="inp-pos" value="1" readonly>
      <input type="button" id="add_0" onclick="CalculateTotal(this,0)" value="+" class="inp-pos">
            <button type="button"pid="<?php echo $row['product_id']?>" id="product" class="btn btn-lg" data-toggle="modal" data-target="#myModal1"><ion-icon name="cart-outline" class="material-icons cart"></ion-icon>Añadir Al Carrito</button>
          </div>
        </div>
        <div class="col-md-12 col-xs-12" id="product_msg"></div>
      </div>
    </div>
  </div>
        </body>
  <html>
            <?php
        }
    }

include 'footer.php';