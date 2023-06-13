<?php
//index.php
include 'connect.php';
include 'header.php';

?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

        <div class="item active">
            <img src="img/banner1.png" alt="Los Angeles" style="width:100%;">
            <div class="carousel-caption">
                <h3>EXPLORA, ELIGE Y LLEVA CONTIGO LA ULTIMA TECNOLOGIA DE LA TIENDA</h3>
            </div>
        </div>

        <div class="item">
            <img src="img/banner2.jpg" alt="Chicago" style="width:100%;">
            <div class="carousel-caption">
                <h3>Eleva tu experiencia digital con nuestras ofertas exclusivas</h3>
            </div>
        </div>

        <div class="item">
            <img src="img/banner3.jpeg" alt="New York" style="width:100%;">
            <div class="carousel-caption">
            </div>
        </div>

        <div class="item">
            <img src="img/banner4.jpg" alt="New York" style="width:100%;">
            <div class="carousel-caption">
            </div>
        </div>
    </div>
</div>
<?PHP include "categorias.php"; ?>

<div id="hot-deal" class="section mainn mainn-raised">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="hot-deal">
          <ul class="hot-deal-countdown">
            <li>
              <div id="days">
                <h3>02</h3>
                <span>Days</span>
              </div>
            </li>
            <li>
              <div id="hours">
                <h3>10</h3>
                <span>Hours</span>
              </div>
            </li>
            <li>
              <div id="minutes">
                <h3>34</h3>
                <span>Mins</span>
              </div>
            </li>
            <li>
              <div id="seconds">
                <h3>60</h3>
                <span>Secs</span>
              </div>
            </li>
          </ul>
          <h2 class="text-uppercase">GRAN OFERTA ESTA SEMANA</h2>
          <p>TODA LA COLECCIÓN HASTA 50% DE DESCUENTO</p>
          <a class="primary-btn cta-btn" href="store.php">Shop now</a>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- <div id="get_category"></div>
<div id="get_product" ></div> -->

<?php
include 'footer.php';
?>