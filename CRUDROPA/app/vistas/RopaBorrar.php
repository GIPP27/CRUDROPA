<!DOCTYPE html>
<html>
<head>
  <title>Borrar una prenda de ropa</title>
  <meta charset="utf-8">
</head>
<body>
  <form action='<?php print RUTA_APP."ropa/borrar/"; ?>' method="POST">
    <table>
      <tr><td><label for="nombre_ropa">Nombre de la prenda:</label></td>
        <td><input type="text" name="nombre_ropa" disabled="disabled" value="<?php print $data["nombre_ropa"]; ?>"></td>
      </tr>
      <tr><td><label for="marca">Marca:</label></td>
        <td><input type="text" name="marca" disabled="disabled" value="<?php print $data["marca"]; ?>"></td>
      </tr>
      <tr><td><label for="tipo_tela">Tipo de tela:</label></td>
        <td><input type="text" name="tipo_tela" disabled="disabled" value="<?php print $data["tipo_tela"]; ?>"></td>
      </tr>
      <tr><td><input type="hidden" value="<?php print $data["id"]; ?>" name="id"></td>
        <td><input type="submit" value="Enviar"></td>
      </tr>
    </table>
    <p>ADVERTENCIA: Una vez borrado el registro NO se podrá recuperar.</p>
  </form>
  <a href='<?php print RUTA_APP."ropa/"; ?>'>Regresar</a>
</body>
</html>
