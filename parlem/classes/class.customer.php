<?php

class cCustomer extends configuracion
{
  var $URL;
  var $URL_admin;
  var $query = "";
  var $pag_numregistros = "";
  var $iduser = "";

  private $conexion;

  public function __construct()
  {
    $this->conexion = parent::conectar(); // Creo una variable con la conexión
    $this->URL = parent::get_URL();
    $this->URL_admin = parent::get_URL_admin();
    return $this->conexion;
  }


  // CONSULTA
  public function consulta($datos)
  {
    $consultas = new cConsultas;
    $tabla = 'customer';
    $res = $consultas->consulta_where($datos, $tabla, ' order by id asc ');
    return $res;
  }

  // INSERT
  public function insert($datos)
  {
    $consultas = new cConsultas;
    $tabla = 'customer';
    $res = $consultas->insert($datos, $tabla);
    return $res;
  }


  // UPDATE
  public function update($datos, $id)
  {
    $consultas = new cConsultas;
    $tabla = 'customer';
    $res = $consultas->update($datos, $id, $tabla);
    return $res;
  }

  // DELETE
  public function delete($id)
  {
    $consultas = new cConsultas;
    $tabla = 'customer';
    $datos = 'id =' . $id;
    $res = $consultas->delete($tabla, $datos);
    return $res;
  }

  //select
  function select_producto($id_customer)
  {
    $select = "SELECT p.*
    from customer_producte cp , producte p
    where cp.id_producte=p.id
    and cp.id_customer=".$id_customer;

    $consultas = new cConsultas;
    $consulta = $select;
     //echo $consulta;
    $result = $consultas->consultarBD($consulta, NULL);
    if ($result) {
      return $result;
    }
  }


  // PAGINACIÓN
  public function pag_numregistros($num)
  {
    $this->pag_numregistros = $num;
  }

  public function get_pag_numregistros()
  {
    return $this->pag_numregistros;
  }

  public function setquery($sql)
  {
    $this->query = $sql;
  }
  public function consulta_paginada($array = array())
  {
    $text = '';
    if (!empty($array['text'])) {
      $text = ' WHERE email LIKE "%' . $array['text'] . '%" ';
    }
    $query = "SELECT * FROM customer " . $text . " " . $array['order'];
    // echo $query;
    $this->setquery($query);
    return $this->paginacion($array['p'], $array['n']);
  }

  public function lista_rs($query, $valores = NULL)
  {
    $oConectar = new cConsultas;
    $valores = NULL;
    $result = $oConectar->consultarBD($query, $valores);
    return $result;
  }

  public function paginacion($pinicio, $numeromaxderegistros)
  {
    // $this->sql($codcategoria);
    $this->numeromaxderegistros = $numeromaxderegistros;
    $this->pinicio = $pinicio;
    $cPaginacion = new cPaginar;
    $cPaginacion->setquery($this->query);
    $cPaginacion->setpinicio($pinicio);
    $cPaginacion->setnumeromaxderegistros($numeromaxderegistros);
    $cPaginacion->totalregistros();
    // Para no repetir consulta
    $this->pag_numregistros = $cPaginacion->totalregistros;
    $cPaginacion->runpaginar();
    //$cPaginacion->estadovariables();
    $rs = $this->lista_rs($cPaginacion->getcadlimit());
    return  $rs;
  }

  public function paginas($pagina, $id, $slug, $div = "lista_contenido")
  {
    $cPaginacion = new cPaginar;
    $cPaginacion->settotalregistros($this->pag_numregistros);
    $cPaginacion->setquery($this->query);
    $cPaginacion->setpinicio($this->pinicio);
    $cPaginacion->setnumeromaxderegistros($this->numeromaxderegistros);
    $cPaginacion->runpaginar();
    // $cPaginacion->estadovariables();
    $return = $cPaginacion->hrefpaginas($pagina, $id, $slug, $div);
    return $return;
  }


  function lista($lista)
  {
    $func = new Funciones;

    $ret['card'] = '';
    $ret['table'] = '';
    $ret['pag'] = '';
    $ret['contador'] = '';

    if (count($lista) > 0) {
      $ret['contador'] = '<p>Mostrando <b class="text-danger">' . count($lista) . '</b> resultados de <b class="text-danger">' . $this->pag_numregistros . '</b> totales</p>';
      foreach ($lista as $key => $value) {
        $dato_get = $func->codifico_get($value);
        $ret['card'] .= '
      <tr>
        <th class="text-center">' . $value['id'] . '</th>
         <td>' . $value['email'] . '</td>
         <td>' . $value['customerId'] . '</td>
         <td>' . $value['givenName'] . '</td>
          <td>' . $value['phone'] . '</td>
      <td class="text-center">
             <a class="btn btn-outline-primary btnUserComo" href="' . $this->URL . 'customer_vista.php?datos=' . $dato_get . '" data-dato="' . $dato_get . '">' . $func->ico("lupa") . '</a>
        </td>
      </tr>
      ';
      }
      $ret['table'] = '
    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle m-0">
        <thead class="table-dark align-middle">
          <tr>
            <th width="50px" class="text-center">#</th>
            <th width="150px">Email</th>
            <th width="100px">customerId</th>
            <th>givenName</th>
            <th>phone</th>
            <th width="150px"  class="text-center">
               Ficha web
            </th>
          </tr>
        </thead>
        <tbody>
        ' . $ret['card'] . '
        </tbody>
      </table>
    </div>
    ';
    } else {
      $ret['table'] = '<div class="alert alert-danger mb-0">No se han encontrado resultados<div>';
    }
    if ($_SESSION['session']['paginacion']['n'] < $this->pag_numregistros) {
      $ret['pag'] = '<div class="my-3">' . $this->paginas("index.php", "0", "link", "lista_contenido") . '</div>';
    }

    return $ret;
  }
}
