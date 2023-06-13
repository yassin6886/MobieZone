<?php
include "header.php";
?>
<!-- HOT DEAL SECTION -->
<div id="hot-deal2" class="section1 mainn mainn-raised">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal1">
						<ul class="hot-deal-countdown1">
							<li>
								<div>
								<a href="index.php"> <h3><img src="img/lineacart_.png"></h3></a>
									<span>COMPRA</span>
								</div>
							</li>
							<li style="width: 115px; height: 115px; border: white 3px solid;">
								<div>
									<h3><img src="img/lineacart2_.png"></h3>
									<span>EDITA TU CARRITO</span>
								</div>
							</li>
							<li>
								<div>
									<a href="checkout.php"> <h3><img src="img/lineacart3_.png"></h3></a>
									<span>RECOGE TU TICKET</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->

<section class="section">
<div class="container-fluid">	
    <div id="cart_checkout">
    </div>
</div>
</section>	
<script>
    function total(x) {
        var precio = document.getElementById("pri" + x).innerText.replace(" €", "")
        document.getElementById("sub" + x).innerHTML = $("#qua" + x).val() * precio + "<small> €</small>"
    }
    function validar(x){
        
        if($("#qua"+x).val() < 1){
            $("#qua"+x).val(1) 
            total(x)
        }else{
            total(x)
        }
    }

    function contar(){
        var count = 0
        $(".qty").each(function(){
            count += parseInt($(this).val())
            
        })
        $("#contarp").text("( "+count+" )")
    }

	function sum(x){
        var sumar = 0
        if($("#qua"+x).val() >= 1){
    	    $(".total-producto").each(function(){
            	sumar += parseInt($(this).text().replace("€", ""))
        	}) 
        	$("#netT").text("Total: " + sumar + " €")
        }
    }
</script>
<?php

include "footer.php";
?>