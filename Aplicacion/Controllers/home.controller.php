<?php

    require_once './aplicacion/models/productos.model.php';
    require_once './aplicacion/models/categorias.model.php';
    require_once './aplicacion/views/home.view.php';

    class HomeController {
        private $model;
        private $modelcat;
        private $view;
    
        public function __construct() {
            $this->model = new ProductosModel();
            $this->modelcat = new CategoriasModel();
            $this->view = new HomeView();
        }
        public function showHome() {
            $Productos = $this->model->getProductos();
            $ProductosCat = $this->modelcat->getCategoriasNames();
            $this->view->showHome($Productos,$ProductosCat);
        }

    }