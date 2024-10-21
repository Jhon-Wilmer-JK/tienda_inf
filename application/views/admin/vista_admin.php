<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vista_fabricante</title>
    <style>
      /* Estilo por defecto */
      .spoiler-container {
          background-color: #7C8A96; /* Color oscuro inicial */
          color: transparent; /* Texto oculto inicialmente */
          transition: background-color 0.3s, color 0.3s; /* Transición suave */
          padding: 10px;
          border-radius: 5px;
      }

      /* Estilo cuando se hace hover */
      .spoiler-container:hover {
          background-color: #f8f9fa; /* Color de fondo claro al hacer hover */
          color: #212529; /* Texto visible al hacer hover */
      }

      /* Estilo de texto al seleccionarlo */
      .spoiler-container::selection {
          background-color: #007bff; /* Color de fondo de selección (azul) */
          color: #7C8A96; /* Color del texto seleccionado (blanco) */
      }

    </style>
</head>
<body>

<div class="container-fluid mt-5">
<div class="row">
    <div class="col">
        <div class="card">
<div class="card-header border-0">
    <h3 class="mb-0">Lista de Admins <a target="_Blank" class="btn btn-warning" href="<?=base_url("reportes_admin/imprimir")?>"><i class="fas fa-file-pdf text-lg me-1"></i> Imprimir</a></h3>
 </div>
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">N°</th>
          <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">User</th>
          <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Password</th>
          <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Opciones</th>
          <th class="text-secondary opacity-7"></th>
        </tr>
      </thead>
      <tbody>
      <?php $i=1; foreach ($ver as $fila) { ?>

        <td>
          <?=$i++?>
        </td>
          <td >
            <div class="d-flex px-2 py-1">
              <div>
                <img src="<?=base_url("fotos/$fila->fotos")?>" style="object-fit: cover;" class="avatar avatar-sm me-3">
              </div>
              <div class="d-flex px-2 py-1">
              <div>
                <h6 class="mb-0 text-xs"><?=$fila->user?></h6>
              </div>
            </div>
          </td>
          <td>
            <div class="spoiler-container">
            <p class="text-xs font-weight-bold mb-0"><?=$fila->password?></p>

            </div>
          </td>



          <td class="align-middle text-center">
            <a class="btn btn-info" href="<?=base_url('controlador_admin/editar/'.$fila->id)?>" id="edit">EDITAR</a>
            <a class="btn btn-danger" href="<?=base_url('controlador_admin/eliminar/'.$fila->id)?>" id="delete">ELIMINAR</a>
            <a target="_Blank" class="btn btn-warning" href="<?=base_url("reportes_admin/imprimir2/".$fila->id)?>"><i class="fas fa-file-pdf text-lg me-1"></i> Imprimir</a>
          </td>

        </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>
</div>
    </div>
</div>

</div>
</body>
<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</html>
