<?php
include_once('basedatos.php');

if (isset($_GET['id'])){
  
  if(eliminar($_GET['id'])){ // Realizar la eliminacion
    $msj = "Actividad eliminada correctamente";
    $estilomsj = 'danger';
  }else{
    $msj = "Problemas al eliminar Actividad";
    $estilomsj = 'warning';
  }//end if
  //print_r($actv); 
  $_SESSION['mensaje']= $msj;
  $_SESSION['estilomsj']= $estilomsj; 
}//end  
header('Location: index.php');

?>