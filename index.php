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
                <h3>INICIO</h3>
            </div>
        </div>

        <div class="item">
            <img src="img/banner2.jpg" alt="Chicago" style="width:100%;">
            <div class="carousel-caption">
                <h3>Chicago</h3>
                <p>Thank you, Chicago!</p>
            </div>
        </div>

        <div class="item">
            <img src="img/banner3.jpeg" alt="New York" style="width:100%;">
            <div class="carousel-caption">
                <h3>New York</h3>
                <p>We love the Big Apple!</p>
            </div>
        </div>

        <div class="item">
            <img src="img/banner4.jpg" alt="New York" style="width:100%;">
            <div class="carousel-caption">
                <h3>New York</h3>
                <p>We love the Big Apple!</p>
            </div>
        </div>
    </div>
</div>

<!-- SECCION DE 3 CATEGORIAS  -->
<div class="section mainn mainn-raised">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <a href="mobile.php" class="cta-btn" data-categoria="movil">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="img/moviles.jpg">
                        </div>
                        <div class="shop-body">
                            <h3>Colección de<br>moviles</h3>
                            <a href="mobile.php" class="cta-btn" data-categoria="movil">Comprar ahora! <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <a href="product.php?p=72">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="./img/accesorios.jpg" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Colección de<br>accesorios</h3>
                            <a href="#"  class="cta-btn" data-categoria="accesorios">Comprar ahora! <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <a href="tablet.php">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="./img/tablets.jpg" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Colección de<br>tablets</h3>
                            <a href="tablet.php" class="cta-btn" data-categoria="tablet">Comprar ahora! <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section mainn mainn-raised">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal">
						<ul class="hot-deal-countdown">
							<li>
								<div>
									<h3>02</h3>
									<span>Days</span>
								</div>
							</li>
							<li>
								<div>
									<h3>10</h3>
									<span>Hours</span>
								</div>
							</li>
							<li>
								<div>
									<h3>34</h3>
									<span>Mins</span>
								</div>
							</li>
							<li>
								<div>
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
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->

<!-- <div id="get_category"></div>
<div id="get_product" ></div> -->

<?php
include 'footer.php';
?>