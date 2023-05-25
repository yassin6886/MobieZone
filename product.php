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
            <section class="product">
                <img src="img/product_images/<?php echo $row['product_image'] ?>" alt="iPhone">
                <h2><?php echo $row['product_title'] ?></h2>
                <p class="description"><?php echo $row['product_desc'] ?></p>
                <p class="price"><?php echo $row['product_price']?>€</p>
                <button pid="<?php echo $row['product_id']?>" id="product">Agregar al carrito</button>
            </section>
            <?php
        }
    }
