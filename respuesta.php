<?php
include 'configuracion.php';
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $URL,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('token' => $token,'referencia' => $_GET['referencia']),
  CURLOPT_HTTPHEADER => array(
    $HTTPHEADER
  ),
));

$response = curl_exec($curl);
curl_close($curl);
$datos = json_decode($response);
?>
<!DOCTYPE html>
<html>
<body>

<h2>Respuesta de Abantos </h2>
<p>Referencia: <?php echo $datos->ref?></p>
<p>Precio:<?php echo $datos->pre;?>€</p>
<p>Stock:<?php echo $datos->sto;?></p>

<button onclic>Volver a enviar otra referencia</button>



</body>
</html>
