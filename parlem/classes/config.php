 <?php

  abstract class configuracion
  {

    var $URL;
    var $UR_admin;
    var $Path;

    function __construct()
    {
    }

    function get_URL()
    {
      //para comprobar si estoy en produccion o pruebas
      $this->URL =  "http://" . $_SERVER["SERVER_NAME"] . "/" . $this->Path;
      if (isset($_SERVER['HTTPS'])) {
        $this->URL =  "https://" . $_SERVER["SERVER_NAME"] . "/" . $this->Path;
      }
      return $this->URL;
    }

    function get_URL_admin()
    {
      return $this->URL_admin;
    }

    protected $datahost;
    protected function conectar($archivo = 'configuracion.ini')
    {

      if (!$ajustes = parse_ini_file($archivo, true)) throw new exception('No se puede abrir el archivo ' . $archivo . '.');
      $controlador = $ajustes["database"]["driver"]; //controlador (MySQL la mayoría de las veces)
      $servidor = $ajustes["database"]["host"]; //servidor como localhost o 127.0.0.1 usar este ultimo cuando el puerto sea diferente
      $puerto = $ajustes["database"]["port"]; //Puerto de la BD
      $basedatos = $ajustes["database"]["schema"]; //nombre de la base de datos
      //$this->URL	= $ajustes["database"]["url"];
      $this->Path  = $ajustes["database"]["path"];
      $this->URL_admin  = $ajustes["database"]["url_admin"];
      unset($_SESSION['conexion_web']);
      $_SESSION['conexion_web'] = $ajustes;
      // var_dump($ajustes);
      try {
        return $this->datahost = new PDO(
          "mysql:host=$servidor;port=$puerto;dbname=$basedatos",
          $ajustes['database']['username'], //usuario
          $ajustes['database']['password'], //constrasena
          array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
      } catch (PDOException $e) {
        echo "Error en la conexión: " . $e->getMessage();
      }
    }
  }
  ?>
