<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <style>
    body{
      
    }
    </style>
</head>
<body>

<?php include("barra.php");

if(isset($_SESSION['uid']) && isset($_SESSION['name'])){

?>

<div class="patterns" style="margin-right: 10%">
  <svg width="100%" height="50%">         
    <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"> </rect>
 <text x="50%" y="50%" text-anchor="middle">
 <?php //echo "{$_SESSION["CUS_NAME"]}"?>
 <?php echo strtoupper($_SESSION["name"]); ?>
 </text>
 </svg>
</div>

<script>
document.querySelectorAll('.button').forEach(button => button.innerHTML = '<div><span>' + button.textContent.trim().split('').join('</span><span>') + '</span></div>');
</script>

<?php
  $sql = "SELECT * from user_info where user_id={$_SESSION["uid"]}";
  $resultado = mysqli_query($con,$sql);
  $row = $resultado->fetch_assoc();
  echo"
  <div class='box' style='margin-left:30.5%;margin-top:0%; margin-bottom:-20%;'>
    <div class='card'>
    <div class='imgBx'>
      <img src='img/{$row['user_image']}' alt='profile' style='width:100%'></div>
      <div class='details'><b>
      <h2>{$row['first_name']}</h2>
      <h2><span>{$row['email']}<br><br>
      <a href='edit_profile.php' class='rainbow rainbow-1' style='border-radius:30px;text-decoration:none'>Edit Profile</a></span></h2>
    </div></div></div>";
?>

</body>

<?php
}