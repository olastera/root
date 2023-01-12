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
     <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
     <meta name="generator" content="Hugo 0.104.2">
     <title>Inicio</title>
      <?php include ($PATH_ROOT."/estructura/head.php") ?>
   </head>
     <body>

     <?php include ($PATH_ROOT."/estructura/header.php") ?>
     <?php include ($PATH_ROOT."/estructura/menu.php") ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
           <?php //include ($PATH_ROOT."/estructura/sub_menu.php") ?>
          <h2>Usuarios </h2>
          <div class="container">
            <div class="row pt-3">
              <div class="col-12 mb-3">
                <div class="card">
                  <div class="card-header bg-white">
                    <h5 class="mb-0 display-5">Add User</h5>
                  </div>
                  <form class="form" id="formUserAdd">
                    <div class="card-body">
                      <div class="row g-3">
                        <div class="col-6">
                          <div class="form-floating">
                            <input type="text" class="form-control" name="name" placeholder="Nombre"  autocomplete="new-password" autofocus="autofocus">
                            <label>Nombre y apellidos</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating">
                            <input type="email" class="form-control" name="username" placeholder="Usuario" autocomplete="new-password">
                            <label>Usuario</label>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-floating">
                            <input type="password" class="form-control"  name="password" placeholder="Contraseña" autocomplete="new-password">
                            <label>Contraseña</label>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-floating">
                            <select class="form-select" name="role" id="user_rol">
                              <option value="">Selecciona un rol</option>
                              <option value="admin">Administrador</option>
                              <option value="user">Usuario</option>
                              <option value="editor">Editor</option>
                            </select>
                            <label>Rol</label>
                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="card-footer bg-white">
                      <div id="errorUserAdd"></div>
                      <button class="btn btn-primary btn-lg w-100 " type="submit" id="button">Añadir usuario</button>
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

const formUserAdd = document.getElementById('formUserAdd');
if(formUserAdd) {
  formUserAdd.addEventListener('submit', async function (e) {
    e.preventDefault();
    alert("aqui");
    let formData = new FormData(this);
      FetchPost(URL+'modulos/users/insert.php', formData, 'errorUserAdd','formUserAdd');
    // f_cargar_contenido_post_formdata (URL+'users/insert.php'," ",formData);
  });
}

</script>

     </body>
   </html>
