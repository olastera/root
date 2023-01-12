<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/inc_parlem/ini.php");
require_once($PATH_ROOT."/classes/load_classes.php");


  // Decodifica y comprueba que exista el usuario
  if (isset($_GET['datos'])) {
    $datos_get = $func->decodifico_get($_GET['datos']);
    if (!is_array($datos_get)) {
       header('Location: '.$URL.'modulos/customer');
    } else {
      $arrayId = array('id' =>$datos_get['id']);
      $customer = new cCustomer;
      $lista = $customer->consulta($arrayId);
      
      if (count($lista)!=1) {
        header('Location: '.$URL.'modulos/customer');
      }
    }
  } else {
    header('Location: '.$URL.'modulos/customer');
  }


    ?>


<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/inc_parlem/ini.php");
require_once($PATH_ROOT."/classes/load_classes.php");
    ?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Inicio</title>
    <?php include ($PATH_ROOT."/estructura/head.php") ?>

  </head>
  <body>

  <?php include ($PATH_ROOT."/estructura/header.php") ?>
  <?php include ($PATH_ROOT."/estructura/menu.php") ?>
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h2>Vista Customer</h2>
        <?php   var_dump2($lista); ?>
       <p> Es una pruba para parlem</p>
     </main>
  </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

    <?php include ($PATH_ROOT."/estructura/footer.php") ?>

    <script>


    </script>
  </body>
</html>
