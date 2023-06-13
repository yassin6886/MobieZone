<?php
session_start();
include("connect.php");

$order_id = $_REQUEST['order_id'];

if(isset($_POST["btn_save"])){
    $estado = $_POST['estado'];
    $price = $_POST["price"];
    $sql = "UPDATE orders_info SET status = '$estado', total_amt = '$price' WHERE order_id = '$order_id'";
    mysqli_query($con, $sql) or die(mysqli_error($con));
}
if(isset($_POST["btn-save2"])){
    $estado2 = $_POST['estado2'];
    $amt = $_POST["amt"];
    $qty = $_POST["qty"];
    $opid = $_POST["opid"];
    $sql = "UPDATE order_products SET status = '$estado2', amt = '$amt', qty = $qty WHERE order_pro_id = '$opid'";
    mysqli_query($con, $sql) or die(mysqli_error($con));
}
include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="col-md-14">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Editar Pedidos General</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table table-hover tablesorter" id="">
                            <thead class="text-primary">
                                <tr>
                                    <th>Nombre Cliente</th>
                                    <th style='width:5%;'>Cantidad Productos</th>
                                    <th>Informacion Contacto</th>
                                    <th>Direccion</th>
                                    <th colspan="2">Precio/Estado</th>
                                    <th></th>
                                    <th>Codigo Pedido</th>
                                    <th>Fecha</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($con, "SELECT SUM(order_products.qty) AS total_qty, orders_info.f_name, orders_info.email, user_info.mobile, orders_info.address, orders_info.city, orders_info.zip, orders_info.state, orders_info.total_amt, orders_info.status, orders_info.order_code, orders_info.order_date, orders_info.order_id
                                FROM orders_info
                                INNER JOIN user_info ON orders_info.user_id = user_info.user_id
                                INNER JOIN order_products ON orders_info.order_id = order_products.order_id
                                WHERE orders_info.order_id = '$order_id'
                                ") or die("query 1 incorrect....." . mysqli_error($con));

                                while(list($qty,$name,$email,$mobile,$address,$city,$zip,$state,$price,$status,$code,$date)=mysqli_fetch_array($result))
                                {
                                ?>
                                    <tr>
                                        <td><?php echo $name; ?></td>
                                        <td style='width:5%;'><?php echo $qty; ?></td>
                                        <td><?php echo $email; ?><br><?php echo $mobile; ?></td>
                                        <td><?php echo $address; ?><br><?php echo $city; ?><br>CP: <?php echo $zip; ?><br><?php echo $state; ?></td>
                                        <td colspan="2" style="width:40%;">
                                        
                                            <form method='post'>
                                            <div class="form-group" style="display: flex;">
                                                <input style="margin:2%;" type='number' id='product_type' name='price' class='form-control' value='<?php echo $price; ?>'>

                                            <select name='estado' style="margin:2%;">
                                                <option value='<?php echo $status; ?>' class="form-control" selected><?php echo $status; ?></option>
                                                <option value='Preparando'>Preparando</option>
                                                <option value='Enviado'>Enviado</option>
                                                <option value='En Camino'>En Camino</option>
                                                <option value='Recibido'>Recibido</option>
                                                <option value='Cancelado'>Cancelado</option>
                                            </select>
                                            <div>
                                        </td>
                                        <td></td>
                                        <td><?php echo $code; ?></td>
                                        <td style='width:30%;'><?php echo $date; ?></td>
                                        <td>
                                            <div class='card-footer'>
                                                <button type='submit' id='btn_save' name='btn_save' required class='btn btn-fill btn-primary'>Actualizar Pedido</button>
                                                </form>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
>


       <!-- End Navbar -->
       <div class="content">
        <div class="container-fluid" >
          <!-- your content here -->
          <div class="col-md-14" >
            <div class="card "  >
              <div class="card-header card-header-primary" >
                <h4 class="card-title">Editar Pedidos Indivudual</h4>
              </div>
              <div class="card-body" >
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary"  >
                      <tr><th>Producto/s</th><th>Nombre</th><th>id Pedido</th><th>Cantidad
                        Estado Precio </th><th></th><th></th><th style='width:15%;'>Fecha compra</th><th></th></thead>
                    <tbody>
                      <?php 
                      $order_id2=$_REQUEST['order_id'];
                      $result2=mysqli_query($con,"SELECT products.product_image, products.product_title, orders_info.order_code, order_products.qty,
                      order_products.status, orders_info.order_date, order_products.amt, order_products.order_pro_id FROM products, orders_info, order_products
                      WHERE orders_info.order_id = '$order_id2' AND orders_info.order_id = order_products.order_id AND 
                      order_products.product_id = products.product_id")or die ("query 1 incorrect.......".mysqli_error($con));
                      while(list($image,$name,$code,$qty,$status,$date,$amt, $order_pro_id)=mysqli_fetch_array($result2))
                      {	
                        echo "<tr><td  style='width:10%;'><img src='../img/product_images/$image' style='height:5%; width:100%;'></td>
                        <td>$name</td>
                        <td>$code</td>
                        <td style='width:30%;' colspan='3'>
                        <form method='post'>
                        <div class='form-group' style='display: flex;'>
                        <input style='width:30%; margin:2%;' type='number' id='product_type' name='qty' class='form-control' value='$qty'>
                        <select name='estado2' style='width:30%; margin:2%;'><option value='$status'>$status</option>
                        <option value='Preparando'>Preparando</option><option value='Enviado'>Enviado</option>
                        <option value='En Camino'>En Camino</option>
                        <option value='Recibido'>Recibido</option><option value='Cancelado'>Cancelado</option></select>
                        <input style='width:30%; margin:2%;' type='number' id='product_type' name='amt' class='form-control' value='$amt'></td>
                        <input type='hidden' name='opid' value='$order_pro_id'>
                        </div>
                        <td style='width:10%;'>$date</td>
                        <td><div class='card-footer'>
                        <button type='submit' id='btn-save2' name='btn-save2' required class='btn btn-fill btn-primary'>Actualizar Pedido</button>
                        </form>
                    </div></td></tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                  
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <?php
include "footer.php";
?>