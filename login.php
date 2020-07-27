<?php
    include_once 'lib_mysql.php';
    try {
        bd_conectar();
    } catch (Exception $e) {
        die($e->getMessage());
    }

    $correo = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $usuario = bd_consultar("select * from usuario where correo = '$correo' and contraseña ='$contraseña'");
    if($usuario == false ){
        ?>
        <script type="text/javascript">
            alert("El ursuario no existe");
            window.location.href='login.html';
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
        alert("Ingreso Correcto");
        window.location.href='index.html';
        </script>
        <?php
        
    }
    bd_desconectar();
?>
