<?php
require_once 'aplicacion/controllers/productos.controller.php';
require_once 'aplicacion/controllers/categorias.controller.php';
require_once 'aplicacion/controllers/autenticar.controller.php';
require_once 'aplicacion/controllers/home.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new homeController();
        $controller->showHome();
        break;
    case 'showByCategorias':
        $controller = new CategoriasController();            
        $controller->showByCategorias();
        break;
    case 'editarproductos':
        $controller = new productosController();
        $controller->showProductos();
        break;
    case 'editarcategorias':
        $controller = new CategoriasController();
        $controller-> showCategorias();
        break;
    case 'agregarProducto':
        $controller = new productosController();
        $controller->addProducto();
        break;
    case 'editarProducto':
        $controller = new productosController();
        $controller->updateProducto();
        break;
    case 'eliminarProducto':
        $controller = new productosController();
        $controller->removeProducto($params[1]);
        break;
    case 'agregarCategoria':
        $controller = new CategoriasController();
        $controller->addCategoria();
        break;
    case 'editarCategoria':
        $controller = new CategoriasController();
        $controller->updateCategoria();
        break;
    case 'eliminarCategoria':
        $controller = new CategoriasController();
        $controller->removeCategoria($params[1]);
        break;
    case 'login':
        $controller = new AutenticarController();
        $controller->showLogin(); 
        break;
    case 'autenticar':
        $controller = new AutenticarController();
        $controller->autenticar();
        break;
    case 'logout':
        $controller = new AutenticarController();
        $controller->logout();
        break;
    default: 
        echo "404 Page Not Found";
        break;
}