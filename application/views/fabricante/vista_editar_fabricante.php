<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>

</head>
<body>

    <?php foreach ($datos as $fila) { ?>

    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 mt-5">
          <div class="card bg-secondary border-0 mb-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small><h2>Editar Fabricante</h2></small>
              </div>
              <form role="form" action="" method="POST">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nombre" type="text" id="nombre" name="nombre" value="<?= $fila->nombre ?>">
                  </div>
                </div>

                <div class="text-center">
                  <input class="btn btn-primary my-4" type="submit" id="editar" name="editar" value="ACTUALIZAR">
                </div>
              </form>
            </div>
          </div>
          

        </div>
      </div>
      <div class="row mt-3"></div>
    <?php } ?>
    

</body>
</html>