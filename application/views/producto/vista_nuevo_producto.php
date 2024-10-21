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
    <!-- Navbar -->


    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 mt-5">
          <div class="card bg-secondary border-0 mb-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small><h2>Agregar Productos</h2></small>
              </div>
              <form role="form" action="<?=base_url('index.php/controlador_producto/adicionar')?>" method="POST"  enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nombre del Producto" type="text" id="nombre" name="nombre" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                        </svg>
                      </span>
                    </div>
                    <input class="form-control" placeholder="Precio" type="number" id="precio" name="precio" step="0.01"  required>
                  </div>
                </div>

                <div class="form-group">
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-tag"></i></span>
                        </div>
                        <select class="form-control" id="fk_codigo" name="fk_codigo" required>
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($marcas as $marca){ ?>
                            <option value="<?=$marca->codigo?>"><?=$marca->nombre?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-image"></i></span>
                        </div>
                        <input class="form-control" type="file" id="upload" name="upload" accept=".jpg, .png" required>
                    </div>
                </div>

                <div class="text-center">
                  <input class="btn btn-primary my-4" type="submit" id="upload" name="upload" value="Agregar" >
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3"></div>

</body>
</html>
