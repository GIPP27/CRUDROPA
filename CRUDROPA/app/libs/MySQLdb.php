<?php
/**
 * Abre la base de datos de tipo MySQL
 */
class MySQLdb {
  private $host = "localhost"; // Servidor de la base de datos
  private $usuario = "root"; // Usuario de MySQL
  private $clave = ""; // La clave está vacía para XAMPP
  private $db = "ropita"; // Nombre de la base de datos
  private $puerto = ""; // No es necesario en XAMPP a menos que se utilice otro puerto
  private $conn;
  
  function __construct() {
    // Conexión a la base de datos
    $this->conn = mysqli_connect($this->host, $this->usuario, $this->clave, $this->db);
    if (mysqli_connect_errno()) {
      // Si hay un error en la conexión, mostrar el mensaje
      printf("Error en la conexión con la base de datos: %s", mysqli_connect_errno()); 
      exit();
    } 

    // Establecer la codificación de caracteres a UTF-8
    if (!mysqli_set_charset($this->conn, "utf8")) {
      printf("Error en la conversión de caracteres: %s", mysqli_error($this->conn)); 
      exit();
    } 
  }

  // Método para consultas tipo SELECT
  public function querySelect($sql) {
    $data = array();
    $r = $this->conn->query($sql);
    while ($row = mysqli_fetch_assoc($r))
      array_push($data, $row);
    return $data;
  }

  // Método para consultas tipo INSERT, UPDATE y DELETE
  public function queryNoSelect($sql) {
    return $this->conn->query($sql);
  }
}
?>
