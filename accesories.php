<?php
include 'header.php';
?>
<div class="main main-raised"> 
        
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
                    <h1>Accesorios</h1>
					<form class="search-form">
						<input class="input" type="text" placeholder="Buscar..." id="searchA">
						<button type="submit" id="search_btnA" class="search-btn">Buscar</button>
					</form>
						<!-- aside Widget -->
						<div id="get_categoryA">
				        </div>
						<!-- /aside Widget -->
                        <div id="get_brandA">
				        </div>
						<!-- store products -->
						<div class="row" id="product-row">
						<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
							<!-- product -->
							<div id="get_productA">
							<!--Here we get product jquery Ajax Request-->
						</div>
							
							<!-- /product -->
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination" id="pagenoA">
								<li ><a class="active" href="#aside">1</a></li>
								
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
</div>
<?php
include 'footer.php';