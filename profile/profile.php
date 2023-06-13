
<?php include("header.php");

if(isset($_SESSION['uid']) && isset($_SESSION['name'])){

?>

<div class="patterns">
  <svg width="100%" height="50%">         
    <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"> </rect>
 <text x="50%" y="50%" text-anchor="middle">
 <?php //echo "{$_SESSION["CUS_NAME"]}"?>
 <?php echo strtoupper($_SESSION["name"]); ?>
 </text>
 </svg>
</div>

<h2 style="text-align: center; color:white;">¡Pasa el raton por la foto para editar tu perfil!</h2><br>

<script>
document.querySelectorAll('.button').forEach(button => button.innerHTML = '<div><span>' + button.textContent.trim().split('').join('</span><span>') + '</span></div>');
</script>

<?php
  $sql = "SELECT * from user_info where user_id={$_SESSION["uid"]}";
  $resultado = mysqli_query($con,$sql);
  $row = $resultado->fetch_assoc();
  echo"
  <div class='box' style='margin-left:37%;margin-top:0%; margin-right:20%;'>
    <div class='card'>
    <div class='imgBx'>
      <img src='img/{$row['user_image']}' alt='profile' style='width:100%'></div>
      <div class='details'><b>
      <h2>{$row['first_name']}</h2>
      <h2><span>{$row['email']}<br><br>
      <a href='edit_profile.php' class='rainbow rainbow-1' style='border-radius:30px;text-decoration:none'>Editar Perfil</a></span></h2>
    </div></div></div>";
?>

<?php
}
include ('footer.php');