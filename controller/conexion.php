<?php

class Conexion
{

    private static $servidor = 'localhost';
    private static $db = 'siabuc9';
    private static $usuario = 'postgres';
    private static $password = '123';
    private static $puerto = '5433  ';

    private static $conexion  = null;

    public function __construct()
    {
        exit('Instancia no permitida');
    }

    public static function conectar()
    {

        if (self::$conexion == null) {
            try {
                self::$conexion =  new PDO("pgsql:host=" . self::$servidor . ";port=" . self::$puerto . ";dbname=" . self::$db, self::$usuario, self::$password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }
        return self::$conexion;
    }

    public static function desconectar()
    {
        self::$conexion = null;
    }
}
