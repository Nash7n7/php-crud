<?php  
  include_once('basedatos.php');

  $filas = consultar(); //Llamado a la función

  include_once('partials/cabecera.php');
?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->
      <?php
          if(isset($_SESSION['mensaje'])){
      ?>
      <div class="alert alert-<?php echo $_SESSION['estilomsj']; ?> alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['mensaje']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
            unset($_SESSION['mensaje']); // destruir variable de session
          }//end if session
      ?>
      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="guardarActv.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Actividad" autofocus="" required>
          </div>
          <div class="form-group">
            <textarea name="descripcion" id="descripcion" rows="2" class="form-control" placeholder="Descripción Actividad" required></textarea>
          </div>
          <input type="submit" name="guardar" id="guardar" class="btn btn-success btn-block" value="Guardar Actividad">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Actividad</th>
            <th>Descripción</th>
            <th>Creada</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php
              echo $filas;
          ?>          
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include_once('partials/pie.php'); ?>