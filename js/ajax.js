$(document).ready(function(){
	cat();
    cathome();
	brand();
	brandM();
	brandT();
	brandA();
	product();

    producthome(); 
	catM();
	catT();
	catA();
	productM();
	productT();
	productA();
	/****Busca las categoarias de la pagina**/
	function cat(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);	
			}
		})
	}
	function catM(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{categoryM:1},
			success	:	function(data){
				$("#get_categoryM").html(data);
			}
		})
	}
	function catT(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{categoryT:1},
			success	:	function(data){
				$("#get_categoryT").html(data);		
			}
		})
	}
	function catA(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{categoryA:1},
			success	:	function(data){
				$("#get_categoryA").html(data);		
			}
		})
	}
    function cathome(){
		$.ajax({
			url	:	"homeaction.php",
			method:	"POST",
			data	:	{categoryhome:1},
			success	:	function(data){
				$("#get_category_home").html(data);
				
			}
		})
	}
	/*****Busca las marcas de la pagina**/
	function brand(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{brand:1},
			success	:	function(data){
				$("#get_brand").html(data);
			}
		})
	}

	function brandM(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{brandM:1},
			success	:	function(data){
				$("#get_brandM").html(data);
			}
		})
	}

	function brandT(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{brandT:1},
			success	:	function(data){
				$("#get_brandT").html(data);
			}
		})
	}

	function brandA(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{brandA:1},
			success	:	function(data){
				$("#get_brandA").html(data);
			}
		})
	}
	/********busca los productos de la pagina******/
		function product(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	}

	function productM(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProductM:1},
			success	:	function(data){
				$("#get_productM").html(data);
			}
		})
	}

	function productT(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProductT:1},
			success	:	function(data){
				$("#get_productT").html(data);
			}
		})
	}

	function productA(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProductA:1},
			success	:	function(data){
				$("#get_productA").html(data);
			}
		})
	}
    gethomeproduts();
    function gethomeproduts(){
		$.ajax({
			url	:	"homeaction.php",
			method:	"POST",
			data	:	{gethomeProduct:1},
			success	:	function(data){
				$("#get_home_product").html(data);
			}
		})
	}
    function producthome(){
		$.ajax({
			url	:	"homeaction.php",
			method:	"POST",
			data	:	{getProducthome:1},
			success	:	function(data){
				$("#get_product_home").html(data);
			}
		})
	}
   
	/****carga los productos relacionados con la categoria******/
	$("body").delegate(".category","click",function(event){
		$("#get_product").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})

	$("body").delegate(".categoryM","click",function(event){
		$("#get_productM").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_CategoryM:1,cat_id:cid},
			success	:	function(data){
				$("#get_productM").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})

	$("body").delegate(".categoryT","click",function(event){
		$("#get_productT").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_CategoryT:1,cat_id:cid},
			success	:	function(data){
				$("#get_productT").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	})

	$("body").delegate(".categoryA","click",function(event){
		$("#get_productA").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_CategoryA:1,cat_id:cid},
			success	:	function(data){
				$("#get_productA").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})

    $("body").delegate(".categoryhome","click",function(event){
		$("#get_product").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"homeaction.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})

	/****carga los productos relacionados con la marca******/
	$("body").delegate(".selectBrand","click",function(event){
		event.preventDefault();
		$("#get_product").html("<h3>Loading...</h3>");
		var bid = $(this).attr('bid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{selectBrand:1,brand_id:bid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	})

	$("body").delegate(".selectBrandM","click",function(event){
		event.preventDefault();
		$("#get_productM").html("<h3>Loading...</h3>");
		var bid = $(this).attr('bid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{selectBrandM:1,brand_id:bid},
			success	:	function(data){
				$("#get_productM").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	})

	$("body").delegate(".selectBrandT","click",function(event){
		event.preventDefault();
		$("#get_productT").html("<h3>Loading...</h3>");
		var bid = $(this).attr('bid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{selectBrandT:1,brand_id:bid},
			success	:	function(data){
				$("#get_productT").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	})

	$("body").delegate(".selectBrandA","click",function(event){
		event.preventDefault();
		$("#get_productA").html("<h3>Loading...</h3>");
		var bid = $(this).attr('bid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{selectBrandA:1,brand_id:bid},
			success	:	function(data){
				$("#get_productA").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	})
	/****Muestra los productos buscado en el buscador******/
	$("#search_btn").click(function(event){
		event.preventDefault();
		$("#get_product").html("<h3>Loading...</h3>");
		var keyword = $("#search").val();
		if(keyword != ""){
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{search:1,keyword:keyword},
			success	:	function(data){ 
				//window.location.href = 'store.php';
					$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
		}
	})
	//end
	$("#search_btnA").click(function(event){
		event.preventDefault();
		$("#get_productA").html("<h3>Loading...</h3>");
		var keyword = $("#searchA").val();
		if(keyword != ""){
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{searchA:1,keyword:keyword},
			success	:	function(data){ 
					$("#get_productA").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
		}
	})

	$("#search_btnM").click(function(event){
		event.preventDefault();
		$("#get_productM").html("<h3>Loading...</h3>");
		var keyword = $("#searchM").val();
		if(keyword != ""){
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{searchM:1,keyword:keyword},
			success	:	function(data){ 
					$("#get_productM").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
		}
	})

	$("#search_btnT").click(function(event){
		event.preventDefault();
		$("#get_productT").html("<h3>Loading...</h3>");
		var keyword = $("#searchT").val();
		if(keyword != ""){
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{searchT:1,keyword:keyword},
			success	:	function(data){ 
					$("#get_productT").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
		}
	})

	/****Funcion de logearse******/
	$("#iniciar").on("click", function() {
		window.location.href = "signin.php";
	});

	$("#inicio").on("click",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url	:	"login.php",
			method:	"POST",
			data	:$("#login").serialize(),
			success	:function(data){
				if(data == "login_success"){
					window.location.href = "index.php";
				}else if(data == "cart_login"){
					window.location.href = "cart.php";
				}else{
					$("#e_msg").html(data);
					$(".overlay").hide();
				}
			}
		})
	})
	//end

	/****Funcion de registrarse******/
	$("#registrarse").on("click", function() {
		window.location.href = "signup.php";
	});

	$("#registrar").on("click",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "register.php",
			method : "POST",
			data : $("#signup_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				if (data == "register_success") {
					window.location.href = "cart.php";
				}else{
					$("#signup_msg").html(data);
				}
				
			}
		})
	})
	
	
    $("#offer_form").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "offersmail.php",
			method : "POST",
			data : $("#offer_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				$("#offer_msg").html(data);
				
			}
		})
	})
    
    
    
	/****obtiene informacion del suario y agrega los productos al carrito******/
	$("body").delegate("#product","click",function(event){
		var pid = $(this).attr("pid");
		var qty = $("#quantity_0").val();
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {addToCart:1,proId:pid,quantity:qty},
			success : function(data){
				count_item();
				getCartItem();
				$('#product_msg').html(data);
				$('.overlay').hide();
			}
		})
	})

	/****cuenta el numero de productos del carrito******/
	count_item();
	function count_item(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {count_item:1},
			success : function(data){
				$(".badge").html(data);
			}
		})
	}

	/****obtiene los productos del carrito y los muestra en el desplegable******/
	getCartItem();
	function getCartItem(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,getCartItem:1},
			success : function(data){
				$("#cart_product").html(data);
                net_total();
                
			}
		})
	}

	//****Actualiza el precio total en el desplegable  ******/
	$("body").delegate(".qty","keyup",function(event){
		event.preventDefault();
		var row = $(this).parent().parent();
		var price = row.find('.price').val();
		var qty = row.find('.qty').val();
		if (isNaN(qty)) {
			qty = 1;
		};
		if (qty < 1) {
			qty = 1;
		};
		var total = price * qty;
		row.find('.total').val(total);
		var net_total=0;
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total: " +net_total+"€");

	})

	/****borra los productos del carrito******/   
    $("body").delegate(".remove","click",function(event){
		event.preventDefault();
        var remove = $(this).parent().parent().parent();
        var remove_id = remove.find(".remove").attr("remove_id");
        $.ajax({
            url	:	"action.php",
            method	:	"POST",
            data	:	{removeItemFromCart:1,rid:remove_id},
            success	:	function(data){
                $("#cart_msg").html(data);
                checkOutDetails();
                }
            })
    })
    
	/****Actualiza la cantidad total de productos del carrito******/
	$("body").delegate(".update","click",function(event){
		var update = $(this).parent().parent().parent();
		var update_id = update.find(".update").attr("update_id");
		var qty = update.find(".qty").val();
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{updateCartItem:1,update_id:update_id,qty:qty},
			success	:	function(data){
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})


	})
	checkOutDetails();
	net_total();

	/****obtiene los productos del carrito y los muestra en el carrito.php y en el desplegable del carrito******/
	function checkOutDetails(){
	 $('.overlay').show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,checkOutDetails:1},
			success : function(data){
				$('.overlay').hide();
				$("#cart_checkout").html(data);
					net_total();
			}
		})
	}

	/****Calcula el total del carrito******/
	function net_total(){
		var net_total = 0;
		$('.qty').each(function(){
			var row = $(this).parent().parent();
			var price  = row.find('.price').val();
			var total = price * $(this).val()-0;
			row.find('.total').val(total);
		})
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total: " +net_total+"€");
	}

	/****Muestra los prodctos con paginacion*****/

	page();
	function page(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{page:1},
			success	:	function(data){
				$("#pageno").html(data);
			}
		})
	}
	$("body").delegate("#page","click",function(event){
		event.preventDefault();
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{getProduct:1,setPage:1,pageNumber:pn},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	})


	pageM();
	function pageM(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{pageM:1},
			success	:	function(data){
				$("#pagenoM").html(data);
			}
		})
	}

	$("body").delegate("#pageM","click",function(event){
		event.preventDefault();
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{getProductM:1,setPageM:1,pageNumber:pn},
			success	:	function(data){
				$("#get_productM").html(data);
			}
		})
	})

	pageT();
	function pageT(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{pageT:1},
			success	:	function(data){
				$("#pagenoT").html(data);
			}
		})
	}

	$("body").delegate("#pageT","click",function(event){
		event.preventDefault();
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{getProductT:1,setPageT:1,pageNumber:pn},
			success	:	function(data){
				$("#get_productT").html(data);
			}
		})
	})

	pageA();
	function pageA(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{pageA:1},
			success	:	function(data){
				$("#pagenoA").html(data);
			}
		})
	}

	$("body").delegate("#pageA","click",function(event){
		event.preventDefault();
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{getProductA:1,setPageA:1,pageNumber:pn},
			success	:	function(data){
				$("#get_productA").html(data);
			}
		})
	})

	/* $(document).on('click', '.cta-btn', function(e) {
		e.preventDefault();
		
		var categoria = $(this).data('categoria');
		
		// Realizar la petición AJAX a "cargar_contenido.php"
		$.ajax({
		  url: 'cargar_contenido.php',
		  method: 'POST',
		  data: { categoria: categoria },
		  success: function(response) {
			// Almacenar la respuesta en sessionStorage
			//sessionStorage.setItem('contenido', response);
			
			// Redirigir a "content.php"
			window.location.href = 'content.php';
		  }
		});
	  }); */
	  
	  
})

$(document).ready(function() {
	$('#searchT, #searchA, #searchM').on('focus', function() {
	  $(this).addClass('centered');
	  $(this).attr('placeholder', '');
	});
  
	$('#searchT, #searchA, #searchM').on('blur', function() {
	  $(this).removeClass('centered');
	  $(this).attr('placeholder', 'Buscar...');
	});
  });