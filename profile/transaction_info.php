<?php
include 'header.php';
$order_id = $_GET['o'];

$sql = "SELECT * FROM orders_info, order_products, products WHERE orders_info.order_id = $order_id 
AND orders_info.order_id = order_products.order_id AND order_products.product_id = products.product_id";
$result = mysqli_query($con, $sql);
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  @import url('https://fonts.googleapis.com/css?family=Assistant');
body {
  background: #000;
  font-family: Assistant, sans-serif;
}

.cell-1 {
  border-collapse: separate;
  border-spacing: 0 4em;
  background: #272727;
  color:#fff;
  border-bottom: 5px solid transparent;
  background-clip: padding-box;
}

thead {
  background: #dddcdc;
}

.toggle-btn {
  width: 40px;
  height: 21px;
  background: grey;
  border-radius: 50px;
  padding: 3px;
  cursor: pointer;
  -webkit-transition: all 0.3s 0.1s ease-in-out;
  -moz-transition: all 0.3s 0.1s ease-in-out;
  -o-transition: all 0.3s 0.1s ease-in-out;
  transition: all 0.3s 0.1s ease-in-out;
}

.toggle-btn > .inner-circle {
  width: 15px;
  height: 15px;
  background: #fff;
  border-radius: 50%;
  -webkit-transition: all 0.3s 0.1s ease-in-out;
  -moz-transition: all 0.3s 0.1s ease-in-out;
  -o-transition: all 0.3s 0.1s ease-in-out;
  transition: all 0.3s 0.1s ease-in-out;
}

.toggle-btn.active {
  background: blue !important;
}

.toggle-btn.active > .inner-circle {
  margin-left: 19px;
}

    </style>

<div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th>producto</th>
                                    <th>Nombre</th>
                                    <th>Numero Pedido</th>
                                    <th>Estado</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th></th>
                                </tr>
                            </thead>
<?php
if ($result && mysqli_num_rows($result) > 0) {
    ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { 
          $iva = $row["amt"] + ($row["amt"] * 0.21);
          ?>
         <tbody class="table-body">
                                <tr class="cell-1">
                                    <td><a href="../product.php?p=<?php echo $row['product_id'] ?>"><img width="85" class="img-thumbnail"
                                    title="<?php echo $row['product_title'] ?>" alt="<?php echo $row['product_title'] ?>"
                                    src="../img/product_images/<?php echo $row['product_image'] ?>"></td>
                                    <td><a href="../product.php?p=<?php echo $row['product_id'] ?>"><?php echo $row['product_title'] ?></a></td>
                                    <td><?php echo $row["order_code"] ?></td>
                                    <?php if ($row["status"] == "Preparando") { ?>
                                    <td><span class="badge badge-success" style="background:#1F7BBF;"><?php echo $row["status"] ?></span></td>
                                    <?php } else if($row["status"] == "Recibido") { ?>
                                    <td><span class="badge badge-success"><?php echo $row["status"] ?></span></td>
                                    <?php } else if($row["status"] == "Cancelado") { ?>
                                    <td><span class="badge badge-success" style="background:red;"><?php echo $row["status"] ?></span></td>
                                    <?php }else if($row["status"] == "En Camino") { ?>
                                    <td><span class="badge badge-success" style="background:#EAA627;"><?php echo $row["status"] ?></span></td>
                                    <?php } else if($row["status"] == "Enviado") { ?>
                                    <td><span class="badge badge-success" style="background:#D8E10B;"><?php echo $row["status"] ?></span></td>
                                    <?php } ?>
                                    <td><?php echo $row['qty'] ?></td>
                                    <td><?php echo $iva ?>€</td>
                                    <td><?php echo $row["order_date"] ?></td>
                                    <td><i class="fa fa-ellipsis-h text-white-50"></i></td>
                                </tr>
                            </tbody>
        <?php } ?>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    echo '<p>No hay productos comprados.</p>';
}
?>
<?php
include 'footer.php';

?>

<style>
        #ver{
        background-color:#2364d2;
        border:#2364d2;
      }
      .nav-items {
    margin-left: 35%;
}
a:hover{
  color:#fff;
}
a{
  color:#fff;
}
</style>