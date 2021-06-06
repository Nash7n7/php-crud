// Validaciones del fomulario
window.onload = iniciar;

function iniciar(){
    document.getElementById('guardar').addEventListener('click',validar,false);
}//end iniciar

    function validaNombre(){
        var elemento = document.getElementById('nombre');
        
        if(elemento.value == ''){
            alert('El campo Nombre no puede estar vacio');
            error(elemento);
            return false;
        }
        return true;
    }

    function validaDescripcion(){
        var elemento = document.getElementById('descripcion');
        
        if(elemento.value == ''){
            alert('El campo Descripcion no puede estar vacio');
            error(elemento);
            return false;
        }
        return true;
    }

    function validar(e){
        if (validaNombre() && validaDescripcion() && confirm('Pulsar Aceptar si quiere enviar Datos')){
            return true;
        }else{
            e.preventDefault();
            return false;
        }
    }

    function error(elemento){
        elemento.focus();
    }    
