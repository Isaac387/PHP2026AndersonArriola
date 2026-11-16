<?php
require_once "app/dat/Producto.php";
require_once 'app/dat/AccesoDatos.php';

function accionBorrar ($codigo){    
    $db = AccesoDatos::getModelo();
    $produ = $db->borrarProducto($codigo);
}

function accionTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
    header("Refresh:0 url='./index.php'");
}
 
function accionAlta(){
    $produ = new Producto();
    $produ->codigo  = "";
    $produ->nombre   = "";
    $produ->stock   = "";
    $produ->stock_min = "";
    $produ->precio = "";
    $orden= "Nuevo";
    include_once "layout/formulario.php";
}

function accionDetalles($codigo){
    $db = AccesoDatos::getModelo();
    $produ = $db->getProducto($codigo);
    $orden = "Detalles";
    include_once "layout/formulario.php";
}


function accionModificar($codigo){
    $db = AccesoDatos::getModelo();
    $produ = $db->getProducto($codigo);
    $orden="Modificar";
    include_once "layout/formulario.php";
}

function accionPostAlta(){
    $produ = new Producto();
    $produ->codigo  = $_POST['codigo'];
    $produ->nombre   = $_POST['nombre'];
    $produ->stock   = $_POST['stock'];
    $produ->stock_min = $_POST['stock_min'];
    $produ->precio = $_POST['precio'];
    $db = AccesoDatos::getModelo();
    $db->addProducto($produ);
    
}

function accionPostModificar(){
    
    $produ = new Producto();
    $produ->codigo  = $_POST['codigo'];
    $produ->nombre   = $_POST['nombre'];
    $produ->stock   = $_POST['stock'];
    $produ->stock_min = $_POST['stock_min'];
    $produ->precio = $_POST['precio'];
    $db = AccesoDatos::getModelo();
    $db->modProducto($produ);
    
}

