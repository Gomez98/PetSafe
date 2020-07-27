<?php
include_once 'lib_mysql.php';
bd_conectar();
$nombre = $_POST['txtNombre'];
$descripcion = $_POST['txtDescripcion'];
$precio = $_POST['txtPrecio'];
$stock = $_POST['txtStock'];
if ( $_POST['txtId'] == "" ) {
  $sql = "insert into producto (id_producto, nombre, descripcion, precio, stock)" 
         ."values(null,'$nombre','$descripcion','$precio','$stock')";
} else { 
  $id = $_POST['txtId'];
  $sql = "update producto set nombre = '$nombre', descripcion = '$descripcion',"
  . " precio = '$precio', stock = '$stock' WHERE id_producto = $id";
}

if (bd_ejecutar($sql)) {
   bd_desconectar();
   ?>
    <script type="text/javascript">
        alert("Edicion correcta");
        window.location.href='intranetMant.php';
    </script>
   <?php
} else {
    ?>
    <script type="text/javascript">
        alert("Error al intentar editar");
        window.location.href='modificar.php';
    </script>
    <?php
   bd_desconectar();
}
?>