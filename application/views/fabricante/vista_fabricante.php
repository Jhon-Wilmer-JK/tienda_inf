<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vista_fabricante</title>
</head>
<body>


    <div class="container-fluid mt-5">
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="mb-0">Lista de Fabricantes <a target="_Blank" class="btn btn-warning" href="<?=base_url("reportes_fabricantes/imprimir")?>"><i class="fas fa-file-pdf text-lg me-1"></i> Imprimir</a></h3>
            </div>
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Nro</th>
                      <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Nombre</th>
                      <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Opciones</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; foreach ($ver2 as $fila) { ?>


                      <td >
                        <div class="d-flex px-2 py-1">
                          <div>
                            <h6 class="mb-0 text-xs"><?=$i++?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                        <p class="text-xs font-weight-bold mb-0"><?=$fila->nombre?></p>

                        </div>
                      </td>

                      <td class="align-middle text-center">
                        <a class="btn btn-info" href="<?=base_url('controlador_fabricante/editar/'.$fila->codigo)?>" id="edit">EDITAR</a>
                        <a class="btn btn-danger" href="<?=base_url('controlador_fabricante/delete/'.$fila->codigo)?>" id="delete">ELIMINAR</a>
                      </td>

                    </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>
    </div>
</div>
</body>
</html>
