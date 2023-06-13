<?php
session_start();
include("connect.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$review_id=$_GET['review_id'];

/*this is delet query*/
mysqli_query($con,"delete from review where id='$review_id'")or die("query is incorrect...");
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
        <div class="container-fluid">
        
        
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Lista de Reseñas</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr><th>Producto</th><th>Nombre</th><th>Reseña</th><th>Respuesta</th><th>Valoracion</th><th>Fecha</th></tr></thead>
                    <tbody>
                      <?php 

                        $result=mysqli_query($con,"SELECT products.product_image, products.product_title, user_info.first_name, review.review, review.star, review.date, review.id, review.response
                        FROM products, user_info, review
                        WHERE review.product_id = products.product_id
                        AND review.user_id = user_info.user_id
                         Limit $page1,12")or die ("query 1 incorrect.....".mysqli_error($con));
                  
                        while(list($image,$product_name,$name,$review,$rating,$date,$review_id, $response)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td><img src='../img/product_images/$image' style='width:50px; height:50px; border:groove #000'><br>$product_name
                        </td><td>$name</td>
                        <td>$review</td>
                        <td>$response</td>
                        <td>";
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
            echo '</span>';
                        echo "</td>
                        <td>$date</td>
                        <td style='min-width:20%'><a style='margin:0;padding:0;' href='responseReview.php?review_id=$review_id' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Responder a reseña'>
                        <i class='material-icons'>edit</i>
                      <div class='ripple-container'></div></a>
                      <a style='margin:0;padding:0;' href='reviews.php?review_id=$review_id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Eliminar Reseña'>
                        <i class='material-icons'>close</i>
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
                  <a class="page-link" href="reviews.php?page=<?php echo $pageBack;?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Anterior</span>
                  </a>
                </li>
                 <?php 
//counting paging

                $paging=mysqli_query($con,"SELECT products.product_image, products.product_title, user_info.first_name, review.review, review.star, review.date, review.id
                FROM products, user_info, review
                WHERE review.product_id = products.product_id
                AND review.user_id = user_info.user_id
                ");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="reviews.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
$pageNext = $page + 1;
?>
                <li class="page-item">
                  <a class="page-link" href="reviews.php?page=<?php echo $pageNext;?>" aria-label="Next">
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