<?php
require 'validaciones.php';
if(isset($_POST['submitSave']))
{
    extract($_POST);
    extract($_FILES["imagen"]);
    $errores=array();
    if(!formatoCorrecto($codigo)){
        array_push($errores,"Codigo no cumple con el formato correcto");
    }
    if(estaVacio($nombre)){
        array_push($errores,"El campo nombre es requerido");
    }
    if(estaVacio($descripcion)){
        array_push($errores,"El campo descripción es requerido");
    }
   
 
    $imgef=implode(" ",$type);

    if(!formato($imgef)){
        array_push($errores,"La imagen no cumple con el formato establecido");
    }
  
    /*if(esEntero($existencia)){
        
    }
    else
    {
        array_push($errores,"No es entero positivo");
    }
    */
    foreach($errores as $er)
{
    ?>
    <div class="alert alert-danger" role="alert">
        <?php
         echo $er; 
        ?>
    </div>
    <?php
}
}
?>