<?php
require 'conexion.php';
$var =0;
if($_SERVER["REQUEST_METHOD"] == "GET") 
{
	$temp = $_GET["temp"];
	$humedad = $_GET["humedad"];
	$lumens = $_GET["lumens"];
	$tempPanel = $_GET["temppanel"];
	$presion = $_GET["presion"];
	$nivelPresion = $_GET["nivelpresion"];
	$voltaje = $_GET["voltaje"];
	$watt = $_GET["watt"];
	$dia = $hoy = date("Y-m-d H:i:s");
}


consultarLogin($temp, $humedad, $lumens, $tempPanel, $presion, $nivelPresion, $voltaje, $watt, $dia);


function consultarLogin($temp, $humedad, $lumens, $tempPanel, $presion, $nivelPresion, $voltaje, $watt, $dia){
    $sql = "INSERT INTO `polaris_arduino`.`datos` (`id`, `temperatura`, `humedad`, `candela`, `temperaturapanel`, `presion`, `nivelpresion`, `fecha`, `voltaje`,  `watt`) VALUES (NULL, '$temp', '$humedad', '$lumens', '$tempPanel', '$presion', '$nivelPresion', '$dia', '$voltaje', '$watt');";
    $db = conexion();
    $result = mysqli_query($db,$sql);
     if($result)
     {
        echo("FUNCO");
     }
}

?>

