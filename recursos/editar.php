<?php
    $productos=simplexml_load_file('productos.xml');
if(isset($_POST['submitSave']))
{
    require 'procesar.php';
    if(empty($errores))
    {
    foreach($productos->producto as $producto){
        if($producto->codigo==$_POST['codigo']){
            $producto->codigo = $_POST['codigo'];
            $producto->nombre = $_POST['nombre'];
            $producto->descripcion =$_POST['descripcion'];
            $producto->precio =$_POST['precio'];
            $producto->existencias =$_POST['existencia'];
            $producto->categoria =$_POST['categoria'];
            $imge=implode(" ",$_FILES['imagen']['name']);
            $ruta="../img/";
            $producto->img =$imge;
            if(isset($_FILES['imagen'])){
                $imge=implode(" ",$_FILES['imagen']['name']);
                $imget=implode(" ",$_FILES['imagen']['tmp_name']);
                $origen_archivo = $imget;
                $destino_archivo = $ruta.$imge;
                @move_uploaded_file($origen_archivo, $destino_archivo);
                }
            break;
        }
    }


    file_put_contents('productos.xml',$productos->asXML());
    header('location: ../index.php');
}
}

foreach($productos->producto as $producto){
    if($producto->codigo==$_GET['codigo']){
    //var_dump($producto);
    $cod = $producto->codigo;
    $nombre = $producto->nombre;
    $descripcion=$producto->descripcion;
    $precio=$producto->precio;
    $existencia=$producto->existencias;
    $categoria=$producto->categoria;
    $imagen=$producto->img;
    break;
    }
}
//var_dump($imageaux);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="style.css">
</head>


  <body>
    <section class="gallery-block cards-gallery">
        <div class="container">
            <div class="heading">
                <h2>Editar Producto</h2>
            </div>
<form action="" method="post" enctype="multipart/form-data">
    <center>
    <table cellpadding="2" cellspacing="2">
        <tr>
            <td>Codigo: </td>
            <td><input type="text" name="codigo" class="form-control"  value="<?php echo $cod;?>" ></td>
        </tr>
        <tr>
            <td>Nombre: </td>
            <td><input type="text" name="nombre"  class="form-control"value="<?php echo $nombre;?>"></td>
        </tr>
        <tr>
            <td>Descripcion: </td>
            <td><input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion;?>"></td>
        </tr>
        <tr>
            <td>Precio: </td>
            <td><input type="text" name="precio" class="form-control"value="<?php echo $precio;?>"></td>
        </tr>
        <tr>
            <td>Existencia: </td>
            <td><input type="text" name="existencia" class="form-control" value="<?php echo $existencia;?>"></td>
        </tr>
        <tr>
            <td>Categoria: </td>
            <td><select id="combobox" name="categoria" id="categoria" value="<?php echo $categoria;?>">
    					<option value="Textil">Textil</option>
    					<option value="Promocional">Promocional</option>
			    </select></td>
        </tr>
        <tr>
            <td>Imagen: </td>
            <td><input type="file" name="imagen[]" id="imagen" ></td>
        </tr>
   
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submitSave" value="Guardar" class="btn btn-warning"></td>
        </tr>
    </table>
    </center>
</form>
</div>
</div>
