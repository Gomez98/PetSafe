<?php
include_once 'lib_mysql.php';
$id = $_GET['id'];
$sql = "delete from producto where id_producto = $id";
bd_conectar();
if (bd_ejecutar($sql)){
    ?>
    <script type="text/javascript">
        alert("Se eliminó el producto correctamente");
        window.location.href='intranetMant.php';
    </script>
    <?php
} else{
    ?>
    <script type="text/javascript">
        alert("Error al eliminar el producto");
        window.location.href='intranetMant.php';
    </script>
    <?php
}