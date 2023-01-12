<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/inc_parlem/ini.php");
require_once($PATH_ROOT."/classes/load_classes.php");
  //  var_dump($_SESSION);
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
      <?php include ($PATH_ROOT."/estructura/head.php") ?>
   </head>
     <body>

     <?php include ($PATH_ROOT."/estructura/header.php") ?>
     <?php include ($PATH_ROOT."/estructura/menu.php") ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
           <?php //include ($PATH_ROOT."/estructura/sub_menu.php") ?>
          <h2>Producte </h2>
          <div class="container">
            <div class="row pt-3">
              <div class="col-12 mb-3">
                <div class="card">
                  <div class="card-header bg-white">
                    <h5 class="mb-0 display-5">Add Producte</h5>
                  </div>
                  <form class="form" id="formAdd">
                    <div class="card-body">
                      <div class="row g-3">
                        <div class="col-6">
                          <div class="form-floating">
                            <input type="text" class="form-control" name="productName" placeholder="productName"    autofocus="autofocus">
                            <label>productName</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating">
                            <input type="text" class="form-control" name="productTypeName" placeholder="producte"  >
                            <label>productTypeName</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating">
                            <input  type="text" class="form-control" name="productTypeName" placeholder="producte"  >
                            <label>productTypeName</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating">
                            <input  type="text" class="form-control" name="customerId" placeholder="producte"  >
                            <label>customerId</label>
                          </div>
                        </div>
                        <div class="col-6">
                    <div class="form-floating">
                      <select class="form-select" name="numeracioTerminal" id="numeracioTerminal">
                        <option value="">Selecciona un numeracioTerminal </option>
                        <option value="933933933"  >933933933</option>
                        <option value="433439893"  >433439893</option>
                        <option value="123339412"  >123339412</option>
                      </select>
                      <label>numeracio Terminal</label>
                    </div>
                  </div>

                      </div>
                    </div>
                    <div class="card-footer bg-white">
                      <div id="errorAdd"></div>
                      <button class="btn btn-primary btn-lg w-100 " type="submit" id="button">Añadir producte</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>

       </main>
     </div>
   </div>

       <?php include ($PATH_ROOT."/estructura/footer.php") ?>
<script>

const formAdd = document.getElementById('formAdd');
if(formAdd) {
  formAdd.addEventListener('submit', async function (e) {
    e.preventDefault();
    alert("aqui");
    let formData = new FormData(this);
      FetchPost(URL+'modulos/producte/insert.php', formData, 'errorAdd','formAdd');
    // f_cargar_contenido_post_formdata (URL+'users/insert.php'," ",formData);
  });
}

</script>

     </body>
   </html>
