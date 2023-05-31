<?php
include 'barra.php';

if((!isset($_SESSION['uid'])) && (!isset($_SESSION['name']))){
	header('Location:../index.php');
}else{
    $uid = $_SESSION['uid'];
}


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
      body{
        background-color:#272727;
      }
      table{
        color:#fff;
      }
      h2{
        color:#fff;
      }
      .header{
        min-height:70px;
      }
      #ver{
        background-color:#2364d2;
        border:#2364d2;
      }
      #transaction{
    background: #E6344A;
  }

  #transaction:after{
    color: #E6344A;
  }
    </style>
</head>
<body>
  <?php
$sql = "SELECT orders_info.*, SUM(order_products.amt * order_products.qty) AS total_amount 
FROM orders_info 
INNER JOIN order_products ON orders_info.order_id = order_products.order_id 
WHERE orders_info.user_id = $uid 
GROUP BY orders_info.order_id";
  $result = mysqli_query($con, $sql);

  if(mysqli_num_rows($result) > 0){ 
    ?>
   <!-- Main Container  -->
<div class="main-container container">
  <div class="row">
<!--Middle Part Start-->
  <div id="content" class="col-sm-9">
    <h2 class="title">Historial de Compra</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
    <?php
  while($row = mysqli_fetch_assoc($result)){
    $IDcompra = uniqid('MZ');
    //$precio = $row["amt"] * $row["qty"];
    $iva =$row["total_amount"] + ($row["total_amount"] * 0.21);
    ?>
      <tbody>
        <tr>
          <td class="text-left"><?php echo $row["f_name"] ?></td>
          <td class="text-center"><?php echo $row["order_code"] ?></td>
          <td class="text-center"><?php echo $row["prod_count"] ?></td>
          <td class="text-center"><?php echo $row["status"] ?></td>
          <td class="text-center"><?php echo $row["order_date"] ?></td>
          <td class="text-right"><?php echo $iva ?>€</td>
          <td class="text-center"><a class="btn btn-info" id="ver" title="" data-toggle="tooltip"
            href="transaction_info.php?o=<?php echo $row["order_id"] ?>" data-original-title="View"><i
            class="fa fa-eye"></i></a>
            <a class="btn btn-info" title="" data-toggle="tooltip" 
            href="generar_ticket.php?o=<?php echo $row["order_id"] ?>" 
            data-original-title="Download"><i class="fa fa-download"></i></a>
        </tr>
      </tbody>
    <?php
  }
} else {
    echo '<h2>No hay productos comprados.</h2>';
  }
  ?>                      
      </table>
    </div>
  </div>
</body>
</html>
