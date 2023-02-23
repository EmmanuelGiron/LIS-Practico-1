<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="css/style.css">
</head>


  <body>
    <section class="gallery-block cards-gallery">
        <div class="container">
            <div class="heading">
                <h2>Productos en la tienda</h2>
            </div>

            <?php
             $productos=simplexml_load_file('recursos/productos.xml'); 
             foreach($productos->producto as $producto) {
            echo "<div class=\"col-md-6 col-lg-4\" style=\"display: inline-block\">";
            echo "<div class=\"card border-0 transform-on-hover\">";
            echo "<a href=\"lightbox\" href=\"img/PROD00003.jpg\"><img src=\"img/".$producto->img."\" class=\"card-img-top\" width=\"200\" height=\"300\"></a>";
            echo "<div class=\"card-body\">";
            echo "<h6>".$producto->nombre."</h6>";
            echo "<button type=\"button\" class=\"btn btn-secondary\" data-toggle=\"modal\" data-target=\"#exampleModal\">
            Ver detalles
          </button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
           
        }
            ?>

        </div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>