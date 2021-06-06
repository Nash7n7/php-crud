<?php
       
    require_once('basedatos.php');

    //print_r($_POST);

    if (isset($_POST)){
        if (
              $_POST['nombre'] != ''
              and
              $_POST['descripcion'] != ''

        ){// validar que no esten vacios los campos
            if(insertar($_POST)){ // Realizar la insercion
                $msj = "Actividad guardada correctamente";
                $estilomsj = 'success';
            }else{
                $msj = "Problemas al guardar Actividad";
                $estilomsj = 'warning';
            }//end if

            $_SESSION['mensaje']= $msj;
            $_SESSION['estilomsj']= $estilomsj;
        }//end if
    }// if POST
    header('Location: index.php'); // retornar control a index

?>