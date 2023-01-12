<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/inc_parlem/ini.php");
require_once($PATH_ROOT . "/classes/load_classes.php");


// Decodifica y comprueba que exista el usuario
if (isset($_GET['datos'])) {
  $datos_get = $func->decodifico_get($_GET['datos']);
  if (!is_array($datos_get)) {
    header('Location: ' . $URL . 'modulos/customer');
  } else {
    $arrayId = array('id' => $datos_get['id']);
    $customer = new cCustomer;
    $lista = $customer->consulta($arrayId);

    //lista de productos
    $productos = $customer->select_producto($datos_get['id']);

    if (count($lista) != 1) {
      header('Location: ' . $URL . 'modulos/customer');
    }
  }
} else {
  header('Location: ' . $URL . 'modulos/customer');
}


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
  <?php include($PATH_ROOT . "/estructura/head.php") ?>

</head>

<body>

  <?php include($PATH_ROOT . "/estructura/header.php") ?>
  <?php include($PATH_ROOT . "/estructura/menu.php") ?>
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Vista Customer</h2>
    <?php   //var_dump2($lista); 
    ?>
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="<?php echo $URL; ?>assets/imagenes/2.png" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?php echo $lista[0]['givenName']; ?></h5>
            <p class="card-text">Email : <?php echo $lista[0]['email']; ?>.</p>
            <p class="card-text"><small class="text-muted"><?php echo $lista[0]['customerId']; ?></small></p>
          </div>
        </div>
      </div>
    </div>


    <?php   //var_dump2($productos); 
    ?>



    <div class="row row-cols-1 row-cols-md-2 g-4">
      <?php 
      
      if($productos) {
      
      foreach ($productos as $key => $value) { ?>
        <div class="card">
          <img src="<?php echo $URL; ?>assets/imagenes/1.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $value['productName']; ?></h5>
            <p class="card-text"><?php echo $value['productTypeName']; ?></p>
            <p class="card-text"><small class="text-muted"><?php echo $value['soldAt']; ?></small></p>
          </div>
        </div>
      <?php }
      
    } else {
        echo '<div class="alert alert-warning" role="alert">
      Sin productos
    </div>';
    }
      
      ?>


    </div>
     
  </main>
  </div>
  </div>
  <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

  <?php include($PATH_ROOT . "/estructura/footer.php") ?>

  <script>


  </script>
</body>

</html>