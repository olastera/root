<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/inc_parlem/ini.php");
require_once($PATH_ROOT."/classes/load_classes.php");
  //  var_dump($_SESSION);

   // Decodifica y comprueba que exista el usuario
   if (isset($_GET['datos'])) {
     $datos_get = $func->decodifico_get($_GET['datos']);
     if (!is_array($datos_get)) {
       header('Location: '.$URL.'modulos/users');
     } else {
       $arrayId = array('id' =>$datos_get['id']);
       $users = new cUsers;
       $lista = $users->consulta_usuario($arrayId);
       if (count($lista)!=1) {
         header('Location: '.$URL.'modulos/users');
       }
     }
   } else {
     header('Location: '.$URL.'modulos/users');
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
                    <button type="button" class="btn btn-danger float-end mt-2" data-bs-toggle="modal" data-bs-target="#modalUserDelete">
                      <i class="bx bxs-trash"></i>
                    </button>
                    <h5 class="mb-0 display-5">Modificar User </h5>
                  </div>
                  <form class="form" id="formUserEdit" data-datos="<?php echo $_GET['datos'] ?>">
                    <div class="card-body">
                      <div class="row g-3">
                        <div class="col-6">
                          <div class="form-floating">
                            <input type="text" class="form-control" name="name" placeholder="Nombre"  autocomplete="new-password" autofocus="autofocus" value="<?php echo $lista[0]['name'] ?>">
                            <label>Nombre y apellidos</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating">
                            <input type="text" class="form-control" name="username" placeholder="Usuario" autocomplete="new-password" value="<?php echo $lista[0]['username'] ?>">
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
                        <div class="col-12" id="user_revistas" style="display:none">
                          <div class="p-3 border border-secondary">
                            <p>Revistas</p>
                            <?php $revistas = $users->consulta_revistas(); ?>
                            <?php
                            foreach ($revistas as $key => $value) {
                              echo '
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="revistas[]" id="revista_'.$value['revista_slug'].'" value="'.$value['revista_id'].'">
                                  <label class="form-check-label" for="revista_'.$value['revista_slug'].'">'.$value['revista_nombre'].'</label>
                                </div>
                              ';
                            }
                             ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer bg-white">
                      <div id="errorUserEdit"></div>
                      <button class="btn btn-primary btn-lg w-100 " type="submit" id="button">Editar usuario</button>
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
           <p>Estás seguro de eliminar este usuario? (<b><?php echo $lista[0]['username'] ?></b>)</p>
           <p class="text-danger h5">Esta acción es irreversible</p>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
           <button type="button" class="btn btn-danger" id="btnUserDelete" data-datos="<?php echo $_GET['datos']; ?>">Eliminar a <b><?php echo $lista[0]['username'] ?></b></button>
         </div>
         <div class="px-2" id="errorUserDelete"></div>
       </div>
     </div>
   </div>

       <?php include ($PATH_ROOT."/estructura/footer.php") ?>
<script>

const formUserEdit = document.getElementById('formUserEdit');
if(formUserEdit) {
  formUserEdit.addEventListener('submit', async function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append('datos', formUserEdit.dataset.datos);
    FetchPost(URL+'modulos/users/update.php', formData, 'errorUserEdit','formUserEdit');
  });
}

  selectElement('user_rol', '<?php echo $lista[0]['role'] ?>' );

</script>

     </body>
   </html>
