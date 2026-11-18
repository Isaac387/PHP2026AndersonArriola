<?php
require_once "Cliente.php";
require_once "Pedido.php";
/*
 * Acceso a datos con BD y Patrón Singleton
 */
class AccesoDatos
{

    private static $modelo = null;
    private $dbh = null;
    private $stmt = null;

    private $stmtExisteCliente = null;

    public static function initModelo()
    {
        if (self::$modelo == null) {
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }

    private function __construct()
    {
        // Cambiar el password si hace falta
        try {
            $dsn = "mysql:host=localhost;dbname=etienda;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión " . $e->getMessage();
            exit();
        }
        try {
            $this->stmt = $this->dbh->prepare(
                 "SELECT * from pedidos 
             WHERE cod_cliente =:cod_cliente 
             ORDER BY precio"
            );
            $this->stmtExisteCliente = $this->dbh->prepare(
                "SELECT * from clientes where nombre =:nombre AND clave = :clave"
            );
        } catch (PDOException $e) {
            echo "Error de conexión " . $e->getMessage();
            exit();
        }
    }

    // Evito que se pueda clonar el objeto.
    public function __clone()
    {
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }

    public function getsPedido(int $cod_cliente): array
    {
        $resu = [];
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'Pedido');
        $this->stmt->bindParam(':cod_cliente', $cod_cliente);
        if ($this->stmt->execute()) {
            $resu = $this->stmt->fetchAll();
        }
        return $resu;
    }
    public function getCliente(string $nombre, string $clave)
    {
        $resu = null;
        $this->stmtExisteCliente->bindValue(':nombre', $nombre);
        $this->stmtExisteCliente->bindValue(':clave', $clave);
        $this->stmtExisteCliente->setFetchMode(PDO::FETCH_CLASS, "Cliente");
        if ($this->stmtExisteCliente->execute()) {
            $resu = $this->stmtExisteCliente->fetch();
        }
        return $resu;
    }
    public function sumarVez($cod_cliente) {
    $stmt = $this->dbh->prepare("UPDATE clientes SET veces = veces + 1 WHERE cod_cliente = :cod");
    $stmt->bindParam(':cod', $cod_cliente);
    $stmt->execute();
}
}
