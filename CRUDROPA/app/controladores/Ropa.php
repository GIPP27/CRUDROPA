<?php
/**
 * Ropa
 */
class Ropa extends Controlador
{
  private $modelo;
  
  /* Define un objeto para acceder a los métodos definidos en class RopaModelo */
  function __construct()
  {
    $this->modelo = $this->modelo("RopaModelo");
  }
  
  /* Retorna de la tabla ropa un arreglo de todos los registros y renderiza éstos en el dashBoard */
  public function index()
  {
    $data = $this->modelo->getRopa();
    /* Renderiza en el dashBoard los datos del registro */
    $this->vista("RopaVista", $data);
  }

  /* Se realiza una petición de envío de un arreglo de datos generada por un <submit> vía POST.
   * Verifica qué variables están pasadas por el método POST, las asigna o deja un campo vacío. 
   */
  public function modificar($id="")
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
      /* Recolecta atributos de un registro $id */
      $id = isset($_POST["id"]) ? $_POST["id"] : "";
      $nombre_ropa = isset($_POST["nombre_ropa"]) ? $_POST["nombre_ropa"] : "";
      $marca = isset($_POST["marca"]) ? $_POST["marca"] : "";
      $tipo_tela = isset($_POST["tipo_tela"]) ? $_POST["tipo_tela"] : "";

      /* Asigna y actualiza los atributos de un registro id seleccionado */
      $this->modelo->modificarRopa($id, $nombre_ropa, $marca, $tipo_tela);
    } 
    else 
    {
      $data = $this->modelo->getRopaById($id);
      $datos = [
        "id" => $id,
        "nombre_ropa" => $data[0]["nombre_ropa"],
        "marca" => $data[0]["marca"],
        "tipo_tela" => $data[0]["tipo_tela"]
      ];
      $this->vista("RopaModificar", $datos);
    }
  }

  /* Retorna y muestra el registro seleccionado.
   * Elimina un registro de la base de datos cuando se presiona el botón submit <Enviar>
   */
  public function borrar($id="")
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
      /* Verifica la existencia de un identificador */
      $id = isset($_POST["id"]) ? $_POST["id"] : "";
      /* Invoca la ejecución de eliminar un registro */
      $this->modelo->borrarRopa($id);
    }
    else 
    {
      /* Retorna recorSet seleccionado por id */
      $data = $this->modelo->getRopaById($id);
      $datos = [
        "id" => $id,
        "nombre_ropa" => $data[0]["nombre_ropa"],
        "marca" => $data[0]["marca"],
        "tipo_tela" => $data[0]["tipo_tela"]
      ];
      /* Actualiza vista y muestra dashboard */
      $this->vista("RopaBorrar", $datos);
    }
  }

  /* Permite agregar una nueva prenda de ropa */
  public function alta()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
      $nombre_ropa = isset($_POST["nombre_ropa"]) ? $_POST["nombre_ropa"] : "";
      $marca = isset($_POST["marca"]) ? $_POST["marca"] : "";
      $tipo_tela = isset($_POST["tipo_tela"]) ? $_POST["tipo_tela"] : "";

      $this->modelo->insertarRopa($nombre_ropa, $marca, $tipo_tela);
    } 
    else 
    {
      $this->vista("RopaAlta");
    }
  }
}
?>
