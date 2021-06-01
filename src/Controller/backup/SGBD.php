<?php


namespace App\Controller\backup;


class SGBD
{
//Funcion para hacer consultas a la base de datos
    public static function sql($query,$nameDb){
        if(!$con=mysqli_connect("localhost","root","")){
            echo "Error en el servidor, verifique sus datos";
        }else{
            if (!mysqli_select_db($con,$nameDb)) {
                echo "Error al conectar con la base de datos, verifique el nombre de la base de datos";
            }else{
                mysqli_set_charset($con,'utf8');
                mysqli_query($con,"SET AUTOCOMMIT=0;");
                mysqli_query($con,"BEGIN;");
                if (!$consul = mysqli_query($con,$query)) {
                    echo 'Error en la consulta SQL ejecutada';
                    mysqli_query($con,"ROLLBACK;");
                }else{
                    mysqli_query($con,"COMMIT;");
                }
                return $consul;
            }
        }
    }

    //Funcion para limpiar variables que contengan inyeccion SQL
    public static function limpiarCadena($valor) {
        $valor=addslashes($valor);
        $valor = str_ireplace("<script>", "", $valor);
        $valor = str_ireplace("</script>", "", $valor);
        $valor = str_ireplace("SELECT * FROM", "", $valor);
        $valor = str_ireplace("DELETE FROM", "", $valor);
        $valor = str_ireplace("UPDATE", "", $valor);
        $valor = str_ireplace("INSERT INTO", "", $valor);
        $valor = str_ireplace("DROP TABLE", "", $valor);
        $valor = str_ireplace("TRUNCATE TABLE", "", $valor);
        $valor = str_ireplace("--", "", $valor);
        $valor = str_ireplace("^", "", $valor);
        $valor = str_ireplace("[", "", $valor);
        $valor = str_ireplace("]", "", $valor);
        $valor = str_ireplace("\\", "", $valor);
        $valor = str_ireplace("=", "", $valor);
        return $valor;
    }
}