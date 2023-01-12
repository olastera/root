<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/inc_parlem/ini.php");
require_once($PATH_ROOT . "/classes/load_classes.php");
//  var_dump($_SESSION);

// Decodifica y comprueba que exista el usuario
if (isset($_GET['datos'])) {
  $datos_get = $func->decodifico_get($_GET['datos']);
  if (!is_array($datos_get)) {
    header('Location: ' . $URL . 'modulos/producte');
  } else {
    $arrayId = array('id' => $datos_get['id']);
    $producte = new cProducte;
    $lista = $producte->consulta($arrayId);
    if (count($lista) != 1) {
      header('Location: ' . $URL . 'modulos/producte');
    }
  }
} else {
  header('Location: ' . $URL . 'modulos/producte');
}
?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Oscar www.iespai.com">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Inicio</title>
  <?php include($PATH_ROOT . "/estructura/head.php") ?>
</head>

<body>

  <?php include($PATH_ROOT . "/estructura/header.php") ?>
  <?php include($PATH_ROOT . "/estructura/menu.php") ?>
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    
    <h2>Producte </h2>
    <div class="container">
      <div class="row pt-3">
        <div class="col-12 mb-3">
          <div class="card">
            <div class="card-header bg-white">
              <button type="button" class="btn btn-danger float-end mt-2" data-bs-toggle="modal" data-bs-target="#modalUserDelete">
                <?php echo $func->ico("delete"); ?>
              </button>
              <h5 class="mb-0 display-5">Modificar Producte </h5>
            </div>
            <form class="form" id="formEdit" data-datos="<?php echo $_GET['datos'] ?>">
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-6">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="productName" placeholder="productName" autofocus="autofocus" value="<?php echo $lista[0]['productName'] ?>">
                      <label>productName</label>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="productTypeName" placeholder="productTypeName" value="<?php echo $lista[0]['productTypeName'] ?>">
                      <label>productTypeName</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="productName" placeholder="productName" autofocus="autofocus" value="<?php echo $lista[0]['productName'] ?>">
                      <label>productName</label>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                          <div class="form-floating">
                            <input  type="text" class="form-control" name="customerId" placeholder="producte"  value="<?php echo $lista[0]['productTypeName'] ?>">
                            <label>customerId</label>
                          </div>
                        </div>
                  <div class="col-6">
                    <div class="form-floating">
                      <select class="form-select" name="role" id="numeracioTerminal">
                        <option value="">Selecciona un numeracioTerminal </option>
                        <option value="933933933" <?php if ($lista[0]['numeracioTerminal'] == "933933933") {
                                                    echo "selected";
                                                  } ?>>933933933</option>
                        <option value="433439893" <?php if ($lista[0]['numeracioTerminal'] == "433439893") {
                                                    echo "selected";
                                                  } ?>>433439893</option>
                        <option value="123339412" <?php if ($lista[0]['numeracioTerminal'] == "123339412") {
                                                    echo "selected";
                                                  } ?>>123339412</option>
                      </select>
                      <label>numeracio Terminal</label>
                    </div>
                  </div>

                </div>
              </div>
              <div class="card-footer bg-white">
                <div id="errorEdit"></div>
                <button class="btn btn-primary btn-lg w-100 " type="submit" id="button">Editar producte</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

  </main>
  </div>
  </div>

  <div class="modal fade" id="modalUserDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar usuario</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Estás seguro de eliminar este productoo? (<b><?php echo $lista[0]['productName'] ?></b>)</p>
          <p class="text-danger h5">Esta acción es irreversible</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger" id="btnDelete" data-datos="<?php echo $_GET['datos']; ?>">Eliminar </button>
        </div>
        <div class="px-2" id="errorDelete"></div>
      </div>
    </div>
  </div>

  <?php include($PATH_ROOT . "/estructura/footer.php") ?>
  <script>


    const formEdit = document.getElementById('formEdit');
    if (formEdit) {
      formEdit.addEventListener('submit', async function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append('datos', formEdit.dataset.datos);
        FetchPost(URL + 'modulos/producte/update.php', formData, 'errorrEdit', 'formEdit');
      });
    }


    const btnDelete = document.getElementById('btnDelete');
    if (btnDelete) {
      btnDelete.addEventListener('click', async function(e) {
        e.preventDefault();
        let formData = new FormData();
        formData.append('datos', btnDelete.dataset.datos);
        FetchPost(URL + 'modulos/producte/delete.php', formData, 'errorDelete', ' ');
      });
    }
  </script>

</body>

</html>