<?php
session_start();
include("connect.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$brand_id=$_GET['brand_id'];
///////picture delete/////////
$result=mysqli_query($con,"select brand_image from brands where brand_id='$brand_id'")
or die("query is incorrect...");

list($picture)=mysqli_fetch_array($result);
$path="../img/$picture";

if(file_exists($path)==true)
{
  unlink($path);
}
else
{}
/*this is delet query*/
mysqli_query($con,"delete from brands where brand_id='$brand_id'")or die("query is incorrect...");
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
                <h4 class="card-title"> Lista de Marcas</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr><th>Imagen</th><th>Marca</th><th>
	<a class=" btn btn-primary" href="addbrand.php">Añadir</a></th></tr></thead>
                    <tbody>
                      <?php 

                        $result=mysqli_query($con,"select brand_id, brand_title, brand_image from brands Limit $page1,12")or die ("query 1 incorrect.....");
                  
                        while(list($brand_id,$brand_name,$image)=mysqli_fetch_array($result))
                        {
                        echo "
                        <tr><td><img src='../img/$image' style='width:50px; height:50px; border:groove #000'></td>
                        <td>$brand_name</td>
                        <td><a href='editbrand.php?brand_id=$brand_id' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Editar Marca'>
                        <i class='material-icons'>edit</i>
                      <div class='ripple-container'></div></a>
                      <a href='brand.php?brand_id=$brand_id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Eliminar Marca'>
                        <i class='material-icons'>close</i>
                      <div class='ripple-container'></div></a>

                        </td></tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Anterior</span>
                  </a>
                </li>
                 <?php 
//counting paging

                $paging=mysqli_query($con,"select brand_id,brand_title,brand_image from brands");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="productlist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
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