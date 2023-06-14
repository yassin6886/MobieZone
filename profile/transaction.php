<?php
include 'header.php';

if((!isset($_SESSION['uid'])) && (!isset($_SESSION['name']))){
	header('Location:../index.php');
}else{
    $uid = $_SESSION['uid'];
}


?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
 
body {
  background: #000;
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

  <?php
$sql = "SELECT orders_info.*, SUM(order_products.amt * order_products.qty) AS total_amount, SUM(order_products.qty) AS total_prod 
FROM orders_info 
INNER JOIN order_products ON orders_info.order_id = order_products.order_id 
WHERE orders_info.user_id = $uid 
GROUP BY orders_info.order_id";
  $result = mysqli_query($con, $sql);

  if(mysqli_num_rows($result) > 0){ 
    ?>
  <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Numero Pedido</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
    <?php
  while($row = mysqli_fetch_assoc($result)){
    $IDcompra = uniqid('MZ');
    //$precio = $row["amt"] * $row["qty"];
    $iva =$row["total_amount"] + ($row["total_amount"] * 0.21);
    ?>
                            <tbody class="table-body">
                                <tr class="cell-1">
                                    <td><?php echo $row["order_code"] ?></td>
                                    <td><?php echo $row["f_name"] ?></td>
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
                                    <td><?php echo $row["total_prod"] ?></td>
                                    <td><?php echo $iva ?>€</td>
                                    <td><?php echo $row["order_date"] ?></td>
                                    <td>
                                    <a class="btn btn-info" id="ver" title="" data-toggle="tooltip" href="transaction_info.php?o=<?php echo $row["order_id"] ?>" data-original-title="View"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-info" title="" data-toggle="tooltip"  href="generar_ticket.php?o=<?php echo $row["order_id"] ?>" data-original-title="Download"
                                     style="background-color:#E6344A;border:#E6344A;"><i class="fa fa-download"></i></a>
                                  </td>
                                    <td><i class="fa fa-ellipsis-h text-white-50"></i></td>
                                </tr>
                            </tbody>
    <?php
  }
  ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php
} else {
    echo '<h2>No hay productos comprados.</h2>';
  }
                     
include 'footer.php';
?>

<style>
        #ver{
        background-color:#2364d2;
        border:#2364d2;
      }
      .nav-items {
    margin-left: 40%;
}
a:hover{
  color:white;
}
</style>