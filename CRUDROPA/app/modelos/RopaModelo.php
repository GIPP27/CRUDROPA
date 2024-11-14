<?php
/**
 * RopaModelo.php     
 * 	Capa modelo contiene la interfaz <$db> para gestionar 
 * 	las operaciones de lectura/escritura/eliminación de un recordSet
 * 	de una tabla en la base de datos.
 * RopaModelo.php contiene:
 * 	i) Define una interfaz para gestionar consultas a una base de datos.
 * 	Mediante una consulta selectiva <querySelect()> se tiene que:
 * 	ii) getRopa() retorna un arreglo de una colección de recordSet
 *      retorna todos los elementos de la tabla.
 * 	iii) getRopaById() retorna un arreglo de UN recordSet.
 * 	Mediante una consulta NO selectiva  <queryNoSelect()> 
     se tiene que:
 * 	iv) insertarRopa() inserta un recordSet y de ser verdadero muestra el dashBoard.
 * 	v) modificarRopa() actualiza un recordSet y de ser verdadero muestra el dashBoard.
 * 	vi) borrarRopa() elimina un recordSet y de ser verdadero muestra el dashBoard.  
 */
class RopaModelo
{
  private $db;

  /* Retorna una interfaz para gestionar operaciones de 
  directivas con bases de datos */
  function __construct()
  {
    $this->db = new MySQLdb(); // Define interfaz para gestionar php-base de datos
  }

  /* Retorna un arreglo de todos los elementos tipo recordSet 
  de la tabla ropa */
  public function getRopa()
  {
    $data = $this->db->querySelect("SELECT * FROM ropa");
    return $data;
  }

  /* Retorna UN recordSet de la tabla ropa */
  public function getRopaById($id)
  {
    $data = $this->db->querySelect("SELECT * FROM ropa WHERE id_ropa=" . $id);
    return $data;
  }

  /* Inserta un recordSet a la tabla ropa */
  public function insertarRopa($nombre_ropa, $marca, $tipo_tela)
  { 
    /* Confecciona una consulta de inserción de un recordSet */
    $sql = "INSERT INTO ropa (id_ropa, nombre_ropa, marca, tipo_tela) VALUES (0, "; // 0: autoincrementa ID
    $sql.= "'".$nombre_ropa."', ";
    $sql.= "'".$marca."', ";
    $sql.= "'".$tipo_tela."')";
    
    /* Ejecuta una sentencia de inserción */
    if ($this->db->queryNoSelect($sql))
    {
      /* Muestra dashboard */
      header("location:".RUTA_APP."ropa");
      exit();
    } else 
    {
      exit("Error al insertar los datos de la ropa");
    }
  }

  /* Realiza una actualización de un recordSet en la 
  tabla ropa mediante una consulta */
  public function modificarRopa($id, $nombre_ropa, $marca, $tipo_tela)
  {
    /* Confecciona la sentencia de actualización */
    $sql = "UPDATE ropa SET ";
    $sql.= "nombre_ropa='".$nombre_ropa."', ";
    $sql.= "marca='".$marca."', ";
    $sql.= "tipo_tela='".$tipo_tela."' ";
    $sql.= "WHERE id_ropa=".$id;
    
    /* Ejecuta una sentencia de actualización */
    if ($this->db->queryNoSelect($sql))
    {
      /* Muestra el dashboard */
      header("location:".RUTA_APP."ropa");
      exit();
    } 
    else
    {
      exit("Error al modificar los datos de la ropa");
    }
  }

  /* Borra un registro seleccionado $id mediante una
     consulta no selectiva */
  public function borrarRopa($id)
  {
    /* Confecciona una sentencia para borrar un registro
    y ejecuta la sentencia */
    $sql = "DELETE FROM ropa ";
    $sql.= "WHERE id_ropa=".$id;

    /* Ejecuta la sentencia de eliminación de registro */
    if ($this->db->queryNoSelect($sql)) 
    { 
      /* Muestra dashboard */
      header("location:".RUTA_APP."ropa");
      exit();
    } 
    else
    {
      exit("Error al borrar la ropa");
    }
  }
}
?>
