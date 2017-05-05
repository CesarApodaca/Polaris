<?php
require '../conexion.php';
//include("connector.php");
session_start();
$bandera = 1;
$cadenaValores = "";
$cadenaEtiquetas ="";
$cadenaJSON = "";


	$cadenaJSON = '{
    "chart": {
        "caption": "Temperatura",
        "subCaption": "Ultimas 12 horas",
        "captionFontSize": "14",
        "subcaptionFontSize": "14",
        "baseFontColor": "#333333",
        "baseFont": "Helvetica Neue,Arial",
        "subcaptionFontBold": "0",
        "xAxisName": "Horas",
        "yAxisName": "Celsius",
        "showValues": "0",
        "paletteColors": "#0075c2,#1aaf5d",
        "bgColor": "#ffffff",
        "showBorder": "0",
        "showShadow": "0",
        "showAlternateHGridColor": "0",
        "showCanvasBorder": "0",
        "showXAxisLine": "1",
        "xAxisLineThickness": "1",
        "xAxisLineColor": "#999999",
        "canvasBgColor": "#ffffff",
        "legendBorderAlpha": "0",
        "legendShadow": "0",
        "divlineAlpha": "100",
        "divlineColor": "#999999",
        "divlineThickness": "1",
        "divLineDashed": "1",
        "divLineDashLen": "1"
    },
    "categories": [
        {
            "category": [
                
              
            ';


//echo $cadenaFinal;
//echo $cadenaJSON;
//print json_encode($cadenaJSON);

obtenerTemperatura($cadenaJSON, $cadenaValores, $cadenaEtiquetas);


function obtenerTemperatura($cadenaJSON, $cadenaValores, $cadenaEtiquetas){
    $data = array();
    $sql = "SELECT * FROM  `datos` ORDER BY  `datos`.`id` DESC LIMIT 17"; 
    $db = conexion();
    $result = mysqli_query($db,$sql);
    	while($fila = mysqli_fetch_assoc($result)) 
        {
			$cont =1;
        	$cadenaValores = $cadenaValores . '{"value": "' . $fila["temperatura"] . '"},';
        	 $cont++;

             $cadenaEtiquetas = $cadenaEtiquetas . '{"label": "' . $fila["fecha"] . '"},';
            
	    }

            $cadenaEtiquetas = $cadenaEtiquetas . '{}';
            $cadenaJSON = $cadenaJSON . $cadenaEtiquetas;
            $cadenaParametro = ']
                }
            ],
            "dataset": [
                {
                    "seriesname": "Arduino",
                    "data": [
                      ';

	       $cadenaJSON = $cadenaJSON . $cadenaParametro;
	        $cadenaValores = $cadenaValores . '{}' . '] } ]}';
			$cadenaJSON = $cadenaJSON . $cadenaValores;
			//print json_encode($cadenaJSON);
            echo $cadenaJSON;
}

?>