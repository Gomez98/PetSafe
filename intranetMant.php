<?php
include_once 'lib_mysql.php';
try {
  bd_conectar();
} catch (Exception $e) {
  die($e->getMessage());
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>IntranetMant</title>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="css/estilosLogin.css">
  <link rel="stylesheet" href="css/tabla.css">
</head>

<body>

  <header>
    <div class="logo logo_main">PetSafe-UTP</div>

    <div class="nav">
      <nav class="menu">
        <ul>
          <li><a href="index.html" style="text-decoration:none">Log Out</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <div style="margin:2rem">
    <a href="modificar.php"><button type='button' class='btn btn-info '>Nuevo Registro</button></a>
  </div>

  <div class="tablaScroll">
    <table>
      <thead>
        <th>ID_PRODUCTO</th>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th colspan="2" style="text-align: center">ACCIONES</th>
      </thead>
      <tbody>
        <?php
        $registros = bd_consultar("select * from producto");
        if (!$registros) {
        ?>
          <tr>
            <td colspan="5"><?= "No hay registros" ?></td>
          </tr>
          <?php
        } else {
          foreach ($registros as $item) {
          ?>
            <tr>
              <td style="text-align: center"><?= $item['id_producto'] ?></td>
              <td><?= $item['nombre'] ?></td>
              <td><?= $item['descripcion'] ?></td>
              <td style="text-align: center">
                <?= $item['precio'] ?>
              </td>
              <td style="text-align: center">
                <?= $item['stock'] ?>
              </td>
              <td style="text-align: center">
                <a href="modificar.php?id=<?= $item['id_producto'] ?>">
                  <button type='button' class='btn btn-success'>Modificar</button></a>
              </td>
              <td style="text-align: center">
                <a href="eliminar.php?id=<?= $item['id_producto'] ?>" onclick="return confirm('¿Seguro que deseas eliminar?');">
                  <button type='button' class='btn btn-danger'>Eliminar</button></a>
              </td>
            </tr>
        <?php
          }
        }
        bd_desconectar()
        ?>
      </tbody>
    </table>

  </div>
  <footer class="footer">&copy all rights reserved</footer>
</body>

</html>