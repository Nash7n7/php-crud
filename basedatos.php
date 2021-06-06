<?php
    session_start(); // Iniciar sesiones

    function conectar(){
        
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'agenda';

        $cnx = mysqli_connect($host,$user,$password,$database);

        if (!$cnx){
            die('Error de conexión de la BD');
            //echo '<span style="color:red"> Error de conexión '.mysqli_connect_error($cnx).'</span>';
            //exit();
        }

        return $cnx; // retornar enlace de conexion;

    }//end function

    function consultar(){
        $cnx = conectar();
        $sql = "SELECT * FROM actividad";

        $result = mysqli_query($cnx,$sql); // Ejecutar instruccion SQL en BD
        //echo "<pre>";
        $filas = "";
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                //print_r($row);
                $filas .= 
            '<tr>
                <td>'.$row['nombre'].'</td>
                <td>'.$row['descripcion'].'</td>
                <td>'.$row['create_at'].'</td>
                <td>
                  <a href="editar.php?id='.$row['id_actividad'].'" class="btn btn-primary">
                    <i class="fas fa-marker"></i>
                  </a>
                  <a href="eliminarActv.php?id='.$row['id_actividad'].'" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                  </a>
                </td>
              </tr>';

            }//end while   
        }else{
           $filas = 
           '<tr> 
                <td colspan="4" align="center"> No existen datos a consultar </td> 
            </tr>';

        }//end if
        //echo "</pre>";
        return $filas;
    }//end function

    function insertar($datos){
        $cnx = conectar();
        //$sql = "INSERT INTO actividad (id_actividad, nombre, descripcion, create_at) VALUES (0,0,0,0)";
        $sql = "INSERT INTO actividad 
                  SET
                    id_actividad=0, 
                    nombre='".trim($datos['nombre'])."', 
                    descripcion='".trim($datos['descripcion'])."'";

        $result = mysqli_query($cnx,$sql);

        if (mysqli_affected_rows($cnx) <=0 ){
            return false;
        }//end if

        return true;

    }//end fuction

    function actualizar($datos){
        $cnx = conectar();
        //$sql = "UPDATE actividad SET nombre='', descripcion='', create_at='' WHERE id_actividad=0 ";

        $sql = "UPDATE actividad 
        SET           
          nombre='".trim($datos['nombre'])."', 
          descripcion='".trim($datos['descripcion'])."'
          WHERE
          id_actividad=".(int)$datos['id_actv'];

        $result = mysqli_query($cnx,$sql);

        if (mysqli_affected_rows($cnx) <=0 ){
            return false;
        }

        return true;

    }//end function

    function eliminar($id){
        $id = (int)$id; // Convertir o asegurarse que sea numerico
        $cnx = conectar();
        $sql = "DELETE FROM actividad WHERE id_actividad=$id ";

        $result = mysqli_query($cnx,$sql);

        if (mysqli_affected_rows($cnx) <=0 ){
            return false;
        }

        return true;

    }//end function

    function consultaRegistro($id){
        $id = (int)$id; // Convertir o asegurarse que sea numerico 
        $cnx = conectar();
        $sql = "SELECT * FROM actividad WHERE id_actividad = $id";

        $result = mysqli_query($cnx,$sql);

        if (mysqli_num_rows($result) > 0){
            $reg = mysqli_fetch_assoc($result); // extrae un slo registro
            return $reg; // devuelve el registro encontrado para valor de $id
        }//end if

        return false;
    }

?>