<?php
    include_once 'lib_mysql.php';
    try {
        bd_conectar();
    } catch (Exception $e) {
        die($e->getMessage());
    }

    $correo = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $empleado = bd_consultar("select * from empleado where id_area = 1 and correo = '$correo' and contraseña ='$contraseña'");
    if($empleado == false ){
        ?>
        <script type="text/javascript">
            alert("El usuario no existe o no es del area de sistemas");
            window.location.href='intranetLog.html';
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
        alert("Ingreso Correcto");
        window.location.href='intranetMant.php';
        </script>
        <?php
        
    }
    bd_desconectar();
?>
