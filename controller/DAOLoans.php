<?php

require_once('conexion.php');
require_once('../model/loans.php');

class DAOLoans
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

    public function getAll()
    {
        try {
            $this->conectar();

            $lista = array();
            $sentenciaSQL = $this->conexion->prepare(
                "SELECT noaccount, nombre, idcarrer, men, women, entrytime, departuretime 
                FROM saci.prestamos p
                JOIN catalogos.usuarios u ON p.noAccount = u.no_cuenta
                where typeofservice = 2;"
            );

            $sentenciaSQL->execute();
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

            foreach ($resultado as $fila) {
                $obj =  new Loan();

                $obj->noAccount = $fila->noaccount;
                $obj->firstName = $fila->nombre;
                $obj->idcarrer = $fila->idcarrera;
                $obj->entryTime = $fila->startdate;
                $obj->departureTime = $fila->enddate;
                $obj->men = $fila->men;
                $obj->women = $fila->women;

                $lista[] = $obj;
            }

            return $lista;
        } catch (PDOException $e) {
            return null;
        } finally {
            Conexion::desconectar();
        }
    }

    /* ------------------------------------------------ */

    public function getOne($id)
    {
        try {
            $this->conectar();
            $obj = null;

            $sentenciaSQL = $this->conexion->prepare(
                "SELECT id, noaccount, startdate, enddate, men, women, idspace, idcomputer, typeofservice FROM saci.prestamos where id = ?"
            );

            $sentenciaSQL->execute([$id]);
            $fila = $sentenciaSQL->fetch(PDO::FETCH_OBJ);

            $obj = new Loan();

            $obj->id = $fila->id;
            $obj->noAccount = $fila->noaccount;
            $obj->entryTime = $fila->startdate;
            $obj->departureTime = $fila->enddate;
            $obj->men = $fila->men;
            $obj->women = $fila->women;
            $obj->idSpace = $fila->idspace;
            $obj->idComputer = $fila->idcomputer;
            $obj->typeOfService = $fila->typeofservice;

            return $obj;
        } catch (Exception $e) {
            return null;
        } finally {
            Conexion::desconectar();
        }
    }

    /* ------------------------------------------------ */

    public function edit(Loan $obj)
    {
        try {
            /* Revisar consulta */
            $sql = "";

            $this->conectar();

            $sentenciaSQL = $this->conexion->prepare($sql);
            $sentenciaSQL->execute(
                array(

                    $obj->entryTime,
                    $obj->id
                )
            );

            return true;
        } catch (PDOException $e) {
            return false;
        } finally {
            Conexion::desconectar();
        }
    }

    /* ------------------------------------------------ */

    public function add(Loan $obj)
    {
        $clave = 0;
        try {
            $sql = "INSERT INTO saci.prestamos (id, noaccount, startdate, enddate, men, women, idspace, idcomputer, typeofservice)
                    VALUES(:id, :noaccount, :startdate, :enddate, 
                    (Select case genero when 'H' then 1 else 0 end from catalogos.usuarios where no_Cuenta= ?),
                    (Select case genero when 'M' then 1 else 0 end from catalogos.usuarios where no_Cuenta= ?),
                    :idspace, :idcomputer, :typeofservice)";

            $this->conectar();
            $this->conexion->prepare($sql)
                ->execute(array(
                    ':id' => $obj->id,
                    ':noaccount' => $obj->noAccount,
                    ':startdate' => $obj->entryTime,
                    ':enddate' => $obj->departureTime,
                    ':men' => $obj->men,
                    ':women' => $obj->women,
                    ':idspace' => $obj->idSpace,
                    ':idcomputer' => $obj->idComputer,
                    ':typeofservice' => $obj->typeOfService
                ));

            $clave = $this->conexion->lastInsertId();
            return $clave;
        } catch (Exception $e) {
            return $clave;
        } finally {
            Conexion::desconectar();
        }
    }
}
