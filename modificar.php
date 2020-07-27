<?php
    include_once 'lib_mysql.php';

    $rotulo = "AGREGAR";

    if (isset($_GET['id'])){    
        $id = $_GET['id'];  
        $sql = "select * from producto where id_producto = $id";
        $rotulo = "MODIFICAR"; 
        bd_conectar();
        $registros = bd_consultar($sql);
        $producto = $registros[0];
        unset($registros);
        bd_desconectar();
    }else {
        $producto['id_producto'] = "";
        $producto['nombre'] = "";
        $producto['descripcion'] = "";
        $producto['precio'] = "";
        $producto['stock'] = "";
        
        
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $rotulo ?> Productos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/estilosContacto.css">
  
</head>
<body style="background-image: url('images/hero-3.jpg');">
<div style=" background-color: rgba(0, 22, 40, .6);">

    <h1 class="tittle"><?= $rotulo ?> PRODUCTOS</h1>
    <form name="InsUpd" class="InsUpd" method="POST" action="editar_grabar.php">
     <input class="inputMod" type="text" name="txtId" value="<?= $producto['id_producto']?>"
             hidden="hidden"/><br/>
         <br>Nombre<br/>
     <input  class="inputMod" type="text" name="txtNombre" value="<?= $producto['nombre']?>" placeholder="Ingrese el nombre" required="required"/><br/>
         <br/>Descripcion:<br/>
     <input class="inputMod" type="text" name="txtDescripcion" value="<?= $producto['descripcion']?>"
     placeholder="Ingrese descripcion" required="required"/><br/>
         <br/>Precio:<br/>
     <input class="inputMod" type="text" name="txtPrecio" value="<?= $producto['precio']?>"
     placeholder="Ingrese el precio" required="required"/><br/>
         <br/>Stock:<br/>
     <input class="inputMod" type="text" name="txtStock"  value="<?= $producto['stock']?>"
         placeholder="Ingrese el stock" required="required"/>
         <br/><br/>
     <br/><input class="inputMod "  type="submit" name="btnGrabar" value="<?= $rotulo ?>">
    </form>
    <footer class="footer">&copy all rights reserved</footer>
</div>
   
</body>
</html>