<?php
include_once "app/dat/Producto.php";
include_once "app/config.php";

/*
 * Acceso a datos con BD productos y Patrón Singleton 
 * Un único objeto para la clase
 * VERSION 1:  las sentencias precompiladas ser crean en cada función
 */
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    
    
    public static function getModelo(){
        // Si no existe lo crea el acceso de a la BD
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    

   // Constructor privado  Patron singleton, se accede por getModelo
   
    private function __construct(){
        
        try {
            $dsn = "mysql:host=".SERVER_DB.";dbname=".DATABASE.";charset=utf8";
            // Creo el objeto PDO estableciendo la conexión a la BD
            $this->dbh = new PDO($dsn,DB_USER,DB_PASSWD);
            // Si falla genera una excepción
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }   
    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            $obj->dbh = null;     // Cierro la conexión
            self::$modelo = null; // Borro el objeto.
        }
    }


    // Devuelvo un array de objeto de productos
    public function getproductos ():array {
        $tuser = [];
        // Sobre la conexión PDO prepara la consulta;
        $stmt_productos  = $this->dbh->prepare("select * from productos");
        // Los resultados se devuelven como objetos de la clase Producto
        $stmt_productos->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        
        // Ejecuto la sentencias 
        if ( $stmt_productos->execute() ){
            //$tuser = $stmt_productos->fetchAll();
            // Mientra $user no sea false, sea un objeto
            while ( $user = $stmt_productos->fetch()){
               // añado ese objeto a la tabla
               $tuser[]= $user;
            }
        }
        

        return $tuser;
    }
    
    // Devuelvo un Producto o false
    public function getProducto (String $codigo) {
        $user = false;
        $stmt_Producto   = $this->dbh->prepare("select * from productos where codigo=:codigo");
        $stmt_Producto->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        $stmt_Producto->bindParam(':codigo', $codigo);
        if ( $stmt_Producto->execute() ){
             // Solo hay un objeto
             if ( $obj = $stmt_Producto->fetch()){
                $user= $obj;
            }
        }
        return $user;
    }
    
    // UPDATE
    public function modProducto($producto):bool{
      
        $stmt_moduser   = $this->dbh->prepare("update productos set nombre=:nombre, stock=:stock, stock_min=:stock_min, precio=:precio where codigo=:codigo");
        $stmt_moduser->bindValue(':codigo',$producto->codigo);
        $stmt_moduser->bindValue(':nombre',$producto->nombre);
        $stmt_moduser->bindValue(':stock',$producto->stock);
        $stmt_moduser->bindValue(':stock_min',$producto->stock_min);
        $stmt_moduser->bindValue(':precio',$producto->precio);
        $stmt_moduser->execute();
        // El número de filas modificadas debe ser 1
        $resu = ($stmt_moduser->rowCount () == 1);
        return $resu;
    }

    //INSERT
    public function addProducto($producto):bool{
        $stmt_creauser  = $this->dbh->prepare("insert into productos (codigo,nombre,stock,stock_min,precio) Values(?,?,?,?,?)");
        //$stmt_creauser->bindValue(1,$user->login);
        $stmt_creauser->execute( [$producto->codigo, $producto->nombre, $producto->stock, $producto->stock_min, $producto->precio]);
        $resu = ($stmt_creauser->rowCount () == 1);
        return $resu;
    }

    //DELETE
    public function borrarProducto(String $codigo):bool {
        $stmt_boruser = $this->dbh->prepare("delete from productos where codigo =:codigo");
        $stmt_boruser->bindValue(':codigo', $codigo);
        $stmt_boruser->execute();
        $resu = ($stmt_boruser->rowCount () == 1);
        return $resu;
    }   
    
     // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}

