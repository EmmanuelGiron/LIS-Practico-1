<?php
 $codigo=$_GET['codigo'];
//if(isset($_GET['action'])){
    $productos=simplexml_load_file('productos.xml');
    
    $index = 0;
    $i=0;
    foreach($productos->producto as $producto){
        if($producto->codigo==$codigo)
        {
            $index=$i;
            break;
        }
        $i++;
    }
    unset($productos->producto[$index]);
    file_put_contents('productos.xml',$productos->asXML());
    header('location: ../index.php');

//}
$productos = simplexml_load_file('productos.xml');

?>