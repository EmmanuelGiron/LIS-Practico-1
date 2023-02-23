<?php
 
if(isset($_POST['submitSave']))
{
    require 'procesar.php';
    if(empty($errores))
    {
    $productos=simplexml_load_file('productos.xml');
    $producto=$productos->addChild('producto');

    $producto->addChild('codigo',$_POST['codigo']); 
    
    $producto->addChild('nombre',$_POST['nombre']);
    $producto->addChild('descripcion',$_POST['descripcion']);
    $producto->addChild('precio',$_POST['precio']);
    $producto->addChild('existencias',$_POST['existencia']);
    $producto->addChild('categoria',$_POST['categoria']);
    $imge=implode(" ",$_FILES['imagen']['name']);
    $imget=implode(" ",$_FILES['imagen']['tmp_name']);
    $producto->addChild('img',$imge);
    $ruta="../img/";
                if(isset($_FILES['imagen'])){
                $origen_archivo = $imget;
                $destino_archivo = $ruta.$imge;
                @move_uploaded_file($origen_archivo, $destino_archivo);
                }
               


    file_put_contents('productos.xml',$productos->asXML());
    
    header('location: ../index.php');
    }
    else
    {
        extract($_POST);
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="style.css">
</head>
  <body>



  <section class="gallery-block cards-gallery">
        <div class="container">
            <div class="heading">
                <h2>Registrar nuevo producto</h2>
            </div>
   
<form action="<?=$_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
<center>
    <table cellpadding="2" cellspacing="2">
       
        <tr>
        <div class="form-group">
            <td>Codigo: </td>
            <td><input type="text" name="codigo"  class="form-control"value="<?= isset($codigo)?$codigo:''?>"></td>
        </div>
        </tr>
        <tr>
        <div class="form-group">
            <td>Nombre: </td>
            <td><input type="text" name="nombre" class="form-control" value="<?= isset($nombre)?$nombre:''?>"></td>
        </div>
        </tr>
        <tr>
        <div class="form-group">
            <td>Descripcion: </td>
            <td><input type="text" name="descripcion" class="form-control" value="<?= isset($descripcion)?$descripcion:''?>"></td>
        </div>
        </tr>
        <tr>
        <div class="form-group">
            <td>Precio: </td>
            <td><input type="text" name="precio" class="form-control" value="<?= isset($precio)?$precio:''?>"></td>
        </tr>
        <tr>
        <div class="form-group">
            <td>Existencias: </td>
            <td><input type="text" name="existencia" class="form-control" value="<?= isset($existencia)?$existencia:''?>"></td>
        </div>
        </tr>
        <tr>
        <div class="form-group">
            <td>Categoria: </td>
            <td><select id="combobox" name="categoria" id="categoria" value="<?php isset($categoria)?$categoria:''?>">
    					<option value="Textil">Textil</option>
    					<option value="Promocional">Promocional</option>
			    </select></td>
        </div>
        </tr>
        <tr>
        <div class="form-group">
            <td>Imagen: </td>
            <td><input type="file" name="imagen[]" id="imagen" ></td>
        </div>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submitSave" value="Guardar" class="btn btn-dark"></td>
            </div>  
        </tr>
        
    </table>
</center>
</form>
</div>
    </section>
</body>