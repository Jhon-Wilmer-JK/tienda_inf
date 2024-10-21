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
                <small><h2>Editar Productos</h2></small>
              </div>
              <form role="form" action="" method="POST" enctype="multipart/form-data">
              <div class="text-center">
                    <div class="avatar-wrapper">
                        <img src="<?= base_url("fotos/$fila->fotos") ?>" id="preview" class="avatar avatar-sm me-3" style="width: 170px; height: 170px; border-radius: 5%; object-fit: cover;">
                        <div class="avatar-upload"  style=" display: block">

                            <input type="file" id="upload" name="upload" accept=".jpg, .png" style="display: none;">
                            <input type="hidden" name="foto_actual" value="<?= $fila->fotos ?>">
                            <label for="upload" class="input" style="padding: 0px;">
                            <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer"></i>
                            </label>
                        </div>
                    </div>
                </div><br>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-bag-17"></i></span>
                    </div>
                    <input class="form-control" placeholder="User" type="text" id="nombre" name="nombre" value="<?= $fila->nombre ?>">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-cart"></i></span>
                    </div>
                    <input class="form-control" placeholder="1"  type="number" id="precio" name="precio" step="0.01" value="<?= $fila->precio ?>">
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-tag"></i></span>
                        </div>
                        <select class="form-control" id="fk_codigo" name="fk_codigo" required>
                            <option value="">Seleccionar Fabricante</option>
                            <?php foreach ($marcas as $marca){ ?>
                                <option value="<?= $marca->codigo ?>" <?= $marca->codigo == $fila->fk_codigo ? 'selected' : '' ?>><?= $marca->nombre ?></option>
                            <?php } ?>
                        </select>
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
<script>
    document.getElementById('upload').addEventListener('change', function() {
        const file = this.files[0];
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('preview').src = event.target.result;
        };
        reader.readAsDataURL(file);
    });
    
</script>
</html>
