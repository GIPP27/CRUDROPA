<!DOCTYPE html>
<html>
<head>
  <title>Dar de alta una prenda de ropa</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="<?php print RUTA_APP.'/img/favicon.jpg'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php print RUTA_APP.'/css/main.css'; ?>">
</head>
<body>
   <h1>Dar de alta una prenda de ropa</h1>
  <fieldset>
   
  <form action='<?php print RUTA_APP."ropa/alta/"; ?>' method="POST">
    <table>
      <tr><td><label for="nombre_ropa">Nombre de la prenda:</label></td>
        <td class="cien"><input type="text" name="nombre_ropa"></td>
      </tr>
      <tr><td><label for="marca">Marca:</label></td>
        <td class="cien"><input type="text" name="marca"></td>
      </tr>
      <tr><td><label for="tipo_tela">Tipo de tela:</label></td>
        <td class="cien"><input type="text" name="tipo_tela"></td>
      </tr>
      <tr><td>&nbsp;</td>
        <td><input type="submit" value="Enviar"></td>
      </tr>
    </table>
  </form>
  </fieldset>
  <a href='<?php print RUTA_APP."ropa/"; ?>'>Regresar</a>
</body>
</html>
