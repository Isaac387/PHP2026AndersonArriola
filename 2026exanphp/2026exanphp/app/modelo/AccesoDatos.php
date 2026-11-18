<?php
require_once "Vuelo.php";
/*
 * Acceso a datos con BD y Patrón Singleton
 */
class AccesoDatos
{

    private static $modelo = null;
    private $dbh = null;
    private $stmt = null;

    private $stmtDestino = null;

    public static function initModelo()
    {
        if (self::$modelo == null) {
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }

    private function __construct()
    {
        // Cambiar le password !!!!!
        try {
            $dsn = "mysql:host=localhost;dbname=Vuelos;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión " . $e->getMessage();
            exit();
        }
        try {
            $this->stmt = $this->dbh->prepare("select * from vuelos 
            where destino=:destino and asientos_libres >=:asientos_libres");
            $this->stmtDestino = $this->dbh->prepare("SELECT COUNT(*) FROM vuelos WHERE destino = :destino");
        } catch (PDOException $e) {
            echo " Error al crear la sentencia " . $e->getMessage();
            exit();
        }
    }

    // Evito que se pueda clonar el objeto.
    public function __clone()
    {
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }

    function  getsVuelos($destino, $plazas): array
    {
        $vuelos = [];
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'Vuelo');
        $this->stmt->bindValue(':destino', $destino);
        $this->stmt->bindValue(':asientos_libres', $plazas);
        if ($this->stmt->execute()) {
            $vuelos = $this->stmt->fetchAll();
        }
        return $vuelos;
    }
    function existeDestino($destino): bool
    {
        $this->stmtDestino->bindValue(':destino', $destino);
        $this->stmtDestino->execute();
        return $this->stmtDestino->fetchColumn() > 0;
    }
}
