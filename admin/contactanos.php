
<?php
session_start();
include("connect.php");

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$id=$_GET['id'];

/*this is delet query*/
mysqli_query($con,"delete from contact_us where email_id='$id'")or die("delete query is incorrect...");
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
                <h4 class="card-title">Contactanos <?php echo $page;?> </h4>
              </div>
              <div class="card-body" >
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary"  >
                      <tr><th>Nombre</th><th style='width:5%;'>Informacion Contacto</th><th>Mensaje</th><th></th></tr></thead>
                    <tbody>
                      <?php 
                      $result = mysqli_query($con, "SELECT email_id, email, name, phone_number, message from contact_us
                      LIMIT $page1, 10
                      ") or die("query 1 incorrect....." . mysqli_error($con));



                        while(list($id, $email, $name,$mobile, $message)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$name</td>
                        <td>$email<br>$mobile</td>
                        <td>$message</td>
                        <td>
                        <a href='contactanos.php?id=$id&action=delete' style='margin:1; padding:0;' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Eliminar Mensaje'>
                        <i class='material-icons'>close</i><div class='ripple-container'></div></a></tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                  
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <?php
include "footer.php";
?>