<?php
session_start();
include "connect.php";

/* use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require 'lib/PHPMailer/src/Exception.php';
require 'lib/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer/src/SMTP.php'; */

if (isset($_SESSION["uid"])) {

	$f_name = $_POST["firstname"];
	$email = $_POST['email'];
	$address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip= $_POST['zip'];
    $cardname= $_POST['cardname'];
    $cardnumber= $_POST['cardNumber'];
    $expdate= $_POST['expdate'];
    $cvv= $_POST['cvv'];
    $user_id=$_SESSION["uid"];
    $cardnumberstr=(string)$cardnumber;
    $total_count=$_POST['total_count'];
    $prod_total = $_POST['total_price'];
    
    
    $sql0="SELECT order_id from `orders_info`";
    $runquery=mysqli_query($con,$sql0);
    if (mysqli_num_rows($runquery) == 0) {
        echo( mysqli_error($con));
        $order_id=1;
    }else if (mysqli_num_rows($runquery) > 0) {
        $sql2="SELECT MAX(order_id) AS max_val from `orders_info`";
        $runquery1=mysqli_query($con,$sql2);
        $row = mysqli_fetch_array($runquery1);
        $order_id= $row["max_val"];
        $order_id=$order_id+1;
        echo( mysqli_error($con));
    }
    $date = date("Y-m-d");
$IDcompra = uniqid('MZ');
$sql = "INSERT INTO `orders_info` 
	(`order_id`, `order_code`, `user_id`, `f_name`, `email`, `address`, 
	`city`, `state`, `zip`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`, `order_date`) 
	VALUES ('$order_id', '$IDcompra', '$user_id', '$f_name', '$email', 
    '$address', '$city', '$state', '$zip', '$cardname', '$cardnumberstr', '$expdate', '$total_count', '$prod_total', '$cvv', '$date')";


/* // Instanciar el objeto PHPMailer
$mail = new PHPMailer(true);
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "shopmobilezone3@gmail.com";
    $mail->Password = "mobilezonetfg3";
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configuración del correo electrónico
    $mail->setFrom('shopmobilezone3@gmail.com', 'Mobile');
    $mail->addAddress($email, $f_name);
    $mail->Subject = 'Compra Realizada';
    $mail->Body = "Estimado(a) $f_name,\n\nGracias por tu compra.\n\nDetalles de la compra:\n\nID de compra: $IDcompra\nTotal: $prod_total\n\n¡Gracias por su compra!";

    // Enviar el correo electrónico
    $mail->send();

    echo 'Correo enviado correctamente';
} catch (Exception $e) {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
exit; */


    if(mysqli_query($con,$sql)){
        $i=1;
        $prod_id_=0;
        $prod_price_=0;
        $prod_qty_=0;
        while($i<=$total_count){
            $str=(string)$i;
            $prod_id_+$str = $_POST['prod_id_'.$i];
            $prod_id=$prod_id_+$str;		
            $prod_price_+$str = $_POST['prod_price_'.$i];
            $prod_price=$prod_price_+$str;
            $prod_qty_+$str = $_POST['prod_qty_'.$i];
            $prod_qty=$prod_qty_+$str;
            $sub_total=(int)$prod_price*(int)$prod_qty;
            $sql1="INSERT INTO `order_products` 
            (`order_pro_id`,`order_id`,`product_id`,`qty`,`amt`) 
            VALUES (NULL, '$order_id','$prod_id','$prod_qty','$sub_total')";
            if(mysqli_query($con,$sql1)){
                $del_sql="DELETE from cart where user_id=$user_id";
                if(mysqli_query($con,$del_sql)){
                    echo"<script>window.location.href='payment_success.php'</script>";
                }else{
                    echo(mysqli_error($con));
                }

            }else{
                echo(mysqli_error($con));
            }
            $i++;


        }
    }else{

        echo(mysqli_error($con));
        
    }
    
}else{
    echo"<script>window.location.href='index.php'</script>";
}
	




?>