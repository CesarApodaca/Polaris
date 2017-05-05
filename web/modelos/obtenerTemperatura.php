<?php
require '../conexion.php';
//include("connector.php");
session_start();
$bandera = 1;
$cadenaValores = "";
$cadenaJSON = "";
if($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET["ban"])) 
{
	$bandera = $_GET["ban"];

}

if($bandera == 2)//estoy en grafica de lineas
{
	$cadenaJSON = "{
    'chart': {
        'caption': 'Total footfall in Bakersfield Central',
        'subCaption': 'Last week',
        'xAxisName': 'Day',
        'yAxisName': 'No. of Footfalls',
        'lineThickness': '2',
        'paletteColors': '#008ee4,#6baa01',
        'baseFontColor': '#333333',
        'baseFont': 'Helvetica Neue,Arial',
        'captionFontSize': '14',
        'subcaptionFontSize': '14',
        'subcaptionFontBold': '0',
        'showBorder': '0',
        'showValues': '0',
        'bgColor': '#ffffff',
        'showShadow': '0',
        'canvasBgColor': '#ffffff',
        'canvasBorderAlpha': '0',
        'divlineAlpha': '100',
        'divlineColor': '#999999',
        'divlineThickness': '1',
        'divLineDashed': '1',
        'divLineDashLen': '1',
        'showXAxisLine': '1',
        'xAxisLineThickness': '1',
        'xAxisLineColor': '#999999',
        'showAlternateHGridColor': '0'
    },
    'data': [
       
    ";
}
else
{
	$cadenaJSON = "{ \"chart\":{
	\"caption\": \"Temperatura\",
	\"subcaption\": \"Ultimas 12 horas\",
	\"xaxisname\": \"Horas\",
	\"renderas\": \"line\",
	\"yaxisname\": \"Grados\",
	\"numberprefix\": \"C \",
	\"theme\": \"carbon\"},
	\"categories\": [{
    \"category\": [{
    \"label\": \"1:00\"},{
                    \"label\": \"2:00\"
                },
                {
                    \"label\": \"3:00\"
                },
                {
                    \"label\": \"4:00\"
                },
                {
                    \"label\": \"5:00\"
                },
                {
                    \"label\": \"6:00\"
                },
                {
                    \"label\": \"7:00\"
                },
                {
                    \"label\": \"8:00\"
                },
                {
                    \"label\": \"9:00\"
                },
                {
                    \"label\": \"10:00\"
                },
                {
                    \"label\": \"11:00\"
                },
                {
                    \"label\": \"12:00\"
                }
            ]
        }
    ],
     \"dataset\": [
        {
           \"seriesname\": \"Actual Revenue\",
            \"data\": [
                
	";
}


//echo $cadenaFinal;
//print json_encode($cadenaFinal);

obtenerTemperatura($cadenaJSON, $cadenaValores, $bandera);


function obtenerTemperatura($cadenaJSON, $cadenaValores, $bandera){
    $data = array();
    $sql = "SELECT * FROM  `datos` ORDER BY  `datos`.`id` DESC LIMIT 0 , 12"; 
    $db = conexion();
    $result = mysqli_query($db,$sql);
    if($bandera != 2)
    {
    	while($fila = mysqli_fetch_assoc($result)) 
        {

	        	$cadenaValores = $cadenaValores . "{\"value\": \"" . $fila["temperatura"] . "\"},";
	            
	        }

	        $cadenaValores = $cadenaValores . "{}" . "]
	        }
	    ]
	}";
			$cadenaJSON = $cadenaJSON . $cadenaValores;
			print json_encode($cadenaJSON);
	   // while ($row = mysqli_fetch_array($result, MYSQL_ASSOC))
	   // {
	   //     $data[] = $row; // add the row in to the results (data) array
	  //  }
	   // print json_encode($data);
	    

		
    }
    else
    {
    	while($fila = mysqli_fetch_assoc($result)) 
        {
			$cont =1;
        	$cadenaValores = $cadenaValores . "{'label: '" . $cont . "','value': '" . $fila["temperatura"] . "'},";
        	 $cont++;
            
	    }
	       
	        $cadenaValores = $cadenaValores . "{}" . "]
	        ]
};";
			$cadenaJSON = $cadenaJSON . $cadenaValores;
			print json_encode($cadenaJSON);
    }
}

?>