<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="css/product.css">
</head>

<body style="background:#000000;">
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
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
  ?>

      <div class="container2">
        <div class="row">
          <div class="col-lg-5 col-md-5">
            <div class="main-image"><img id="thumbnail" src="img/product_images/<?php echo $row['product_image'] ?>" alt=""> </div>
            <div class="pic-center"> <img onclick="change_image(this)" src="img/product_images/<?php echo $row['product_image'] ?>"> <img onclick="change_image(this)" src="img/product_images/<?php echo $row['product_image2'] ?>"> </div>
          </div>
          <div class="col-lg-7 col-md-7">
            <div class="section-heading">
              <h2 class="title"><?php echo $row['product_title'] ?></h2>
              <h6 class="menuh6"><?php echo $row['product_price'] ?>€</h6>
            </div>
            <div class="section-body">
              <p><?php echo $row['product_desc'] ?></p>
              <div class="quantity">
                <input type="button" id="remove_0" onclick="CalculateTotal(this,0)" value="-" class="inp-pos">
                <input type="text" placeholder="1" name="quantity" id="quantity_0" onchange="CalculateTotal(this,0)" class="inp-pos" value="1" readonly>
                <input type="button" id="add_0" onclick="CalculateTotal(this,0)" value="+" class="inp-pos">
                <button type="button" pid="<?php echo $row['product_id'] ?>" id="product" class="btn btn-lg"><ion-icon name="cart-outline" class="material-icons cart"></ion-icon>Añadir Al Carrito</button>
              </div><br><br>
              <div class="col-md-12 col-xs-12" id="product_msg"></div>
              <h2 style="text-align:left;">Deja tu reseña</h2>
              <form id="rev">
                <div class="product-review-stars">
                  <input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label for="star5" title="Increible!">★</label>
                  <input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label for="star4" title="Muy bien">★</label>
                  <input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label for="star3" title="Meh">★</label>
                  <input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label for="star2" title="Malo">★</label>
                  <input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label for="star1" title="Muy Malo">★</label>
                </div>
                <div class="containerText">
                  <div class="backdrop">
                    <div class="highlights"></div>
                  </div>
                  <textarea name="textarea" id="textarea"></textarea>
                </div>
                <input type="hidden" value="<?php echo $row['product_id'] ?>" class="pro_id" name="pro_id" id="pro_id" />
                <input type="hidden" value="<?php if (isset($_SESSION["uid"])) {
                                              echo $_SESSION['uid'];
                                            } ?>" class="user_id" name="user_id" id="user_id" />
                <button type="button" name="publicar" id="review" class="publicar">Publicar</button>
              </form>
            </div>
          </div>

        </div>
      </div>
      </div>
      </div>
      </div>


      <div id="get_review" style="background:#000000; color:#fff;">
      </div>


      <div class="store-filter clearfix" style="margin-right:50%">
        <ul class="store-pagination" id="pagenoR">
          <li><a class="active" href="#aside">1</a></li>
          <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul>
      </div>



</body>
<html>
<?php
    }
  }

  include 'footer.php';
