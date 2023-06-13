<?php
session_start();
include("connect.php");

$order_id=$_REQUEST['order_id'];
$result=mysqli_query($con,"SELECT products.product_image, products.product_title, orders_info.order_code, order_products.qty,
orders_info.status, orders_info.order_date, order_products.amt FROM products, orders_info, order_products
WHERE orders_info.order_id = $order_id AND orders_info.order_id = order_products.order_id AND 
order_products.product_id = products.product_id")or die ("query 1 incorrect.......".mysqli_error($con));


include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid" >
          <!-- your content here -->
          <div class="col-md-14" >
            <div class="card "  >
              <div class="card-header card-header-primary" >
                <h4 class="card-title">Informacio de Pedidos</h4>
              </div>
              <div class="card-body" >
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary"  >
                      <tr><th>Producto/s</th><th>Nombre</th><th>id Pedido</th><th>Cantidad</th>
                      <th>Estado</th><th>Fecha compra</th><th>Precio</th></thead>
                    <tbody>
                      <?php 
                      while(list($image,$name,$code,$qty,$status,$date,$amt)=mysqli_fetch_array($result))
                      {	
                        echo "<tr><td  style='width:10%;'><img src='../img/product_images/$image' style='height:5%; width:100%;'></td>
                        <td>$name</td>
                        <td>$code</td>
                        <td>$qty</td>
                        <td>$status</td>
                        <td>$date</td>
                        <td>".$amt."€</td></tr>";
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