<?php
session_start();
include("connect.php");
$review_id=$_REQUEST['review_id'];

$result=mysqli_query($con,"SELECT products.product_image, products.product_title, user_info.first_name, review.review, review.star, review.date, review.id, review.response
FROM products, user_info, review WHERE review.id = $review_id AND review.product_id = products.product_id AND review.user_id = user_info.user_id")or die ("query 1 incorrect.....".mysqli_error($con));

list($image,$product_name,$name,$review,$rating,$date,$review_id, $response)=mysqli_fetch_array($result);

if($response != ''){
    $response = $response;
}

if(isset($_POST['btn_save']))
{
 $textarea = $_POST["textarea"];

 $sql = "UPDATE review SET response = '$textarea' WHERE id = $review_id";
mysqli_query($con, $sql);
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
                      <tr><th>Producto</th><th>Nombre</th><th>Reseña</th><th>Valoracion</th><th>Fecha</th></tr></thead>
                    <tbody>
                        <?php
                    echo "<tr><td><img src='../img/product_images/$image' style='width:50px; height:50px; border:groove #000'><br>$product_name
                        </td><td>$name</td>
                        <td>$review</td>
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
                            echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label style="color:#d35400;" title="Malo">★</label>';
                            echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label style="color:#d35400;"  title="Muy Malo">★</label>';
                        } else if ($rating == 3) {
                            echo '<input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label for="" title="Increible!">★</label>';
                            echo '<input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label for="" title="Muy bien">★</label>';
                            echo '<input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label style="color:#F39C12;" title="Meh">★</label>';
                            echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label style="color:#F39C12;" title="Malo">★</label>';
                            echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label style="color:#F39C12;"  title="Muy Malo">★</label>';
                        } else if ($rating == 4) {
                            echo '<input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label for="" title="Increible!">★</label>';
                            echo '<input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label style="color:#F39C12;"  title="Muy bien">★</label>';
                            echo '<input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label style="color:#F39C12;"  title="Meh">★</label>';
                            echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label style="color:#F39C12;" title="Malo">★</label>';
                            echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label style="color:#F39C12;"  title="Muy Malo">★</label>';
                        } else if ($rating == 5) {
                            echo '<input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label style="color:#2ecc71;"  title="Increible!">★</label>';
                            echo '<input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label style="color:#2ecc71;"  title="Muy bien">★</label>';
                            echo '<input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label style="color:#2ecc71;"  title="Meh">★</label>';
                            echo '<input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label style="color:#2ecc71;" title="Malo">★</label>';
                            echo '<input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label style="color:#2ecc71;"  title="Muy Malo">★</label>';
                        }
                        echo '</span>';
                        echo '</td></tr>
                        <tr>
                        <td colspan="4">
                        <form method="POST">
                        <div class="containerText">
                        <div class="backdrop">
                            <div class="highlights"></div>
                        </div>
                        <input type="hidden" value="'. $review_id .'" class="review_id" name="review_id">
                        <textarea name="textarea" class="textarea" id="textarea">'. $response .'</textarea>
                        </div>
                        <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Guardar Respuesta</button>
                        </td>
                        </tr>';
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
      <?php
include "footer.php";
?>