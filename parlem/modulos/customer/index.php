<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/inc_parlem/ini.php");
require_once($PATH_ROOT."/classes/load_classes.php");
    //var_dump($_SESSION);
   ?>

   <?php
   $num_por_pagina=10;

   if(!isset($_GET['p'])) {
     unset($_SESSION['session']['paginacion']);
     $_SESSION['session']['paginacion'] = array(
       'text'=>'',
       'p'=>0,
       'order'=>' order by  id desc ',
       'n'=>$num_por_pagina
     );
   } else {
     $_SESSION['session']['paginacion'] = array(
       'text'=>$_SESSION['session']['paginacion']['text'],
       'p'=>$_GET['p'],
       'order'=>' order by  id desc ',
       'n'=>$num_por_pagina
     );

   }
   if(isset($_GET['text'])) {
     $_SESSION['session']['paginacion']['text'] = $_GET['text'];
   }

   $customer = new cCustomer;
   $lista = $customer->consulta_paginada ($_SESSION['session']['paginacion']);

   $table = $customer->lista ($lista);

   ?>



   <!doctype html>
   <html lang="es">
     <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="description" content="">
       <meta name="author" content="oscar www.iespai.com">
        
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
                <form method="get">
                  <div class="input-group input-group-lg">
                		<input type="text" class="form-control " placeholder="Buscar customers" autofocus="" name="text" value="<?php echo $_SESSION['session']['paginacion']['text'] ?>">
                    <button type="submit" class="btn btn-im pt-1"><?php echo $func->ico("lupa"); ?></button>
                	</div>
                </form>
              </div>
              <div class="col-12 mb-3">
                <div class="card">
                  <div class="card-body">
                    <?php echo  $table['contador']; ?>
                    <?php echo $table['table']; ?>
                  </div>
                </div>
                <?php echo $table['pag']; ?>

              </div>
            </div>
          </div>
  <?php include ($PATH_ROOT."/estructura/footer2.php") ?>
       </main>
     </div>
   </div>


       <?php include ($PATH_ROOT."/estructura/footer.php") ?>

       <script>

 


       </script>
     </body>
   </html>
