
    <?php
session_start();
include("connect.php");

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$order_id=$_GET['order_id'];

/*this is delet query*/
mysqli_query($con,"delete from orders_info where order_id='$order_id'")or die("delete query is incorrect...");
} 

///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
}

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
                <h4 class="card-title">Pedidos  / Pagina <?php echo $page;?> </h4>
              </div>
              <div class="card-body" >
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary"  >
                      <tr><th>Nombre Cliente</th><th style='width:5%;'>Cantidad Productos</th><th>Informacion Contacto</th><th>Direccion</th><th>Precio</th><th>Estado</th>
                      <th>Codigo Pedido</th><th>Fecha</th><th></th></tr></thead>
                    <tbody>
                      <?php 
                      $result = mysqli_query($con, "SELECT SUM(order_products.qty) AS total_prod, orders_info.f_name, orders_info.email, user_info.mobile,
                      orders_info.address, orders_info.city, orders_info.zip, orders_info.state, orders_info.total_amt, orders_info.status,
                      orders_info.order_code, orders_info.order_date, orders_info.order_id
                      FROM orders_info
                      INNER JOIN user_info ON orders_info.user_id = user_info.user_id
                      INNER JOIN order_products ON orders_info.order_id = order_products.order_id
                      WHERE orders_info.user_id = user_info.user_id AND order_products.order_id = orders_info.order_id
                      GROUP BY orders_info.order_id
                      LIMIT $page1, 10
                      ") or die("query 1 incorrect....." . mysqli_error($con));



                        while(list($prod_count,$name,$email,$mobile,$address,$city,$zip,$state,$price,$status,$code,$date,$order_id)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$name</td>
                        <td style='width:5%;'>$prod_count</td>
                        <td>$email<br>$mobile</td>
                        <td>$address<br>$city<br>CP: $zip<br>$state</td>
                        <td>".$price."€</td>
                        <td>$status</td>
                        <td>$code</td>
                        <td style='width:10%;'>$date</td>
                        <td style='width:8%; dislpay:inine;'>
                        <a href='editorder.php?order_id=$order_id' style='margin:1; padding:0;' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Editar Pedido'>
                        <i class='material-icons'>edit</i>
                      <div class='ripple-container'></div></a>

                        <a href='orders.php?order_id=$order_id&action=delete' style='margin:1; padding:0;' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Eliminar Pedido'>
                        <i class='material-icons'>close</i><div class='ripple-container'></div></a>
                        
                        <a href='vieworder.php?order_id=$order_id' style='margin:1; padding:0;' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Ver Pedido'>
                        <i class='fa-solid fa-eye'></i>
                      <div class='ripple-container'></div></a>
                        </td></tr>";
                        }
                        $pageBack = $page -1;
                        ?>
                    </tbody>
                  </table>
                  
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="orders.php?page=<?php echo $pageBack;?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Anterior</span>
                  </a>
                </li>
                 <?php 
//counting paging

                $paging=mysqli_query($con,"SELECT SUM(order_products.qty) AS total_prod, orders_info.f_name, orders_info.email, user_info.mobile,
                orders_info.address, orders_info.city, orders_info.zip, orders_info.state, orders_info.total_amt, orders_info.status,
                orders_info.order_code, orders_info.order_date, orders_info.order_id
                FROM orders_info
                INNER JOIN user_info ON orders_info.user_id = user_info.user_id
                INNER JOIN order_products ON orders_info.order_id = order_products.order_id
                WHERE orders_info.user_id = user_info.user_id AND order_products.order_id = orders_info.order_id
                GROUP BY orders_info.order_id");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="orders.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
$pageNext = $page + 1;
?>
                <li class="page-item">
                  <a class="page-link" href="orders.php?page=<?php echo $pageNext;?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Siguiente</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>   
        </div>
      </div>
      <?php
include "footer.php";
?>