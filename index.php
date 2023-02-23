<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="style.css">
</head>
  <body>

  <section class="gallery-block cards-gallery">
        <div class="container">
            <div class="heading">
                <h2>Listado de productos</h2>
            </div>
<br>
<a href="recursos/agregar.php" class="btn btn-success">Agregar un nuevo producto</a>
<br>
<br>
<br>
<table class="table">
    <tr>
        <th scope="col">Codigo</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Precio</th>
        <th scope="col">Existencias</th>
        <th scope="col">Categoria</th>
        <th scope="col">Imagen</th>
    </tr>
    <?php
        $productos=simplexml_load_file('recursos/productos.xml'); 
        foreach($productos->producto as $producto) {
        ?>
        <tr>
            <td><?php echo $producto->codigo; ?></td>
            <td><?php echo  $producto->nombre?></td>
            <td><?php echo  $producto->descripcion?></td>
            <td><?php echo $producto->precio ?></td>
            <td><?php echo  $producto->existencias?></td>
            <td><?php echo  $producto->categoria?></td>
            <td><img src="img/<?=$producto->img?>" alt="product" width="200" height="200"></td>
            <td aling="center">
              <a href="recursos/editar.php?codigo=<?php echo $producto->codigo?>" class="btn btn-primary">Editar</a></td>
              <td><a href="recursos/eliminar.php?&codigo=<?php echo $producto->codigo?>" onclick="return confirm('Eliminar el producto?')" class="btn btn-danger">Eliminar</a></td>
        </tr>
        <?php }?>
    </table>
        </div>
        </section>
