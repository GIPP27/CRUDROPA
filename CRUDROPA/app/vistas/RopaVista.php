<!DOCTYPE html> <!-- dashBoard -->
<html>
<head>
  <title>Lista de ropa</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="<?php print RUTA_APP.'/img/OIP.jpg'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php print RUTA_APP.'/css/main.css'; ?>">
</head>
<body>
  <h1>Ropa</h1>
  <table>
    <thead>
      <th>id</th>
      <th>Nombre de la prenda</th>
      <th>Marca</th>
      <th>Tipo de tela</th>
      <th>Modificar</th>
      <th>Borrar</th>
    </thead>
    <tbody>
      <?php
      for ($i=0; $i < count($data); $i++) { 
        print "<tr>";
        print "<td>".$data[$i]["id_ropa"]."</td>";
        print "<td>".$data[$i]["nombre_ropa"]."</td>";
        print "<td>".$data[$i]["marca"]."</td>";
        print "<td>".$data[$i]["tipo_tela"]."</td>";
        print "<td><a href='".RUTA_APP."ropa/modificar/".$data[$i]["id_ropa"]."'>Modificar</a></td>";
        print "<td><a href='".RUTA_APP."ropa/borrar/".$data[$i]["id_ropa"]."'>Borrar</a></td>";
        print "</tr>";
      }
    ?>
    </tbody>
  </table>
  <br>
  <a href='<?php print RUTA_APP."ropa/alta/"; ?>'>Dar de alta una prenda</a>
</body>
</html>
