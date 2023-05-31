<?php
include 'barra.php';
$order_id = $_GET['o'];

$sql = "SELECT * FROM orders_info, order_products, products WHERE orders_info.order_id = $order_id 
AND orders_info.order_id = order_products.order_id AND order_products.product_id = products.product_id";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Productos Comprados</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <style>
    body {
      background-color: #272727;
    }

    table {
      color: #fff;
    }

    h2 {
      color: #fff;
    }

    .header {
      min-height: 70px;
    }
    a{
        color:#fff;
        text-decoration:none;
    }
  </style>
</head>
<body>
<div class="main-container container">
  <div class="row">
<!--Middle Part Start-->
  <div id="content" class="col-sm-9">
    <h2 class="title">Productos</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
      <thead>
        <tr>
            <td class="text-center">Producto</td>
            <td class="text-left">Nombre</td>
            <td class="text-center">Id pedido</td>
            <td class="text-center">Cantidad</td>
            <td class="text-center">Estado</td>
            <td class="text-center">Fecha Envio</td>
            <td class="text-right">Precio</td>
        </tr>
    </thead>
<?php
if ($result && mysqli_num_rows($result) > 0) {
    ?>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { 
          $iva = $row["amt"] + ($row["amt"] + 0.21);
          ?>
          <tr>
            <td class="text-center">
              <a href="../product.php?p=<?php echo $row['product_id'] ?>"><img width="85" class="img-thumbnail"
                  title="<?php echo $row['product_title'] ?>" alt="<?php echo $row['product_title'] ?>"
                  src="../img/product_images/<?php echo $row['product_image'] ?>">
              </a>
            </td>
            <td class="text-left">
              <a href="../product.php?p=<?php echo $row['product_id'] ?>"><?php echo $row['product_title'] ?></a>
            </td>
            <td class="text-center"><?php echo $row["order_code"] ?></td>
            <td class="text-center"><?php echo $row['qty'] ?></td>
            <td class="text-center"><?php echo $row["status"] ?></td>
            <td class="text-center"><?php echo $row["order_date"] ?></td>
            <td class="text-center"><?php echo $iva ?>€</td> 
          </tr>
        <?php } ?>
      </tbody>
    <?php
} else {
    echo '<p>No hay productos comprados.</p>';
}
?>
        </table>
    </div>
  </div>
</body>
</html>
