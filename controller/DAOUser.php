<?php

require_once('conexion.php');
require_once('../model/user.php');

class DAOUser
{
    private $conexion;

    private function conectar()
    {
        try {
            $this->conexion = Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /* ------------------------------------------------ */

    public function autenticate($email, $password)
    {
        try {
            $this->conectar();

            $obj = null;

            $sentenciaSQL = $this->conexion->prepare("SELECT id,firstName,typeofuser  FROM saci.usuarios 
            WHERE email=? AND passworduser=?;");

            /* AST(passworduser as varchar(28))=CAST(sha224(?) as varchar(28)) */

            $sentenciaSQL->execute(array($email, $password));
            $fila = $sentenciaSQL->fetch(PDO::FETCH_OBJ);

            if ($fila) {
                $obj = new User();

                $obj->id = $fila->id;
                $obj->firstName = $fila->firstname;
                $obj->typeOfUser = $fila->typeofuser;


                return $obj;
            }
            return null;
        } catch (Exception $e) {
            return null;
        } finally {
            Conexion::desconectar();
        }
    }
}
