<?php
  include_once('basedatos.php');

  if (isset($_GET['id'])){
    $actv = consultaRegistro($_GET['id']);
    if (!$actv){
      header('Location: index.php');
    } 
    //print_r($actv);
  }//end  

  if (isset($_POST['nombre']) and ($_POST['descripcion']) ) {
    $_POST['nombre'] !='';
    $_POST['descripcion'] !='';
    
    // validar que no esten vacios los campos
        if(actualizar($_POST)){ // Realizar la insercion
            $msj = "Actividad actualizada correctamente";
            $estilomsj = 'primary';
        }else{
            $msj = "Problemas al actualizar Actividad";
            $estilomsj = 'warning';
        }//end if

        $_SESSION['mensaje']= $msj;
        $_SESSION['estilomsj']= $estilomsj;
        header('Location: index.php');
    }//end if    
  // if POST  

  include_once('partials/cabecera.php');
?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php" method="post">
        <div class="form-group">
          <input type="hidden" name="id_actv" value="<?php echo $actv['id_actividad'] ?>" >
          <input name="nombre" type="text" class="form-control" value="<?php echo $actv['nombre'] ?>" placeholder="Actualizar Actividad">
        </div>
        <div class="form-group">
        <textarea name="descripcion" class="form-control" cols="30" rows="10"><?php echo $actv['descripcion'] ?></textarea>
        </div>
        <button class="btn btn-success btn-block" name="actualizar"> Actualizar</button>
      </form>
      </div>
    </div>
  </div>
</div>

<?php include_once('partials/pie.php'); ?>