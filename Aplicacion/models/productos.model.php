<?php

require_once './aplicacion/models/model.php';

class ProductosModel extends DB {

    function getProductos() {
        $query = $this->connect()->prepare('SELECT producto.*,CATEGORIA.categoria
                                            FROM producto 
                                            INNER JOIN CATEGORIA ON producto.IDcategoria = categoria.IDcategoria');     

        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
    public function getItem ($id){
        $query= $this->connect()->prepare('SELECT * product where id=?');
        $query->execute([$id]);
        $productos = $query->fetch(PDO::FETCH_OBJ);
        return $productos;
    }

    function insertProducto($PRODUCTO, $precio,$IDcategoria) {
        $query = $this->connect()->prepare('INSERT INTO `PRODUCTO` (`PRODUCTO`, `Precio`, `IDcategoria``) VALUES(?,?,?)');
        $query->execute([$PRODUCTO, $precio,$IDcategoria]);
        return $this->connect()->lastInsertId();
    }
    function updateProducto($id,$PRODUCTO, $precio,$IDcategoria) {
        $query = $this->connect()->prepare('UPDATE producto SET PRODUCTO=?, Precio=?,IDcategoria=?WHERE IDproducto=?');
        $query->execute([$PRODUCTO, $precio,$IDcategorias,$id]);
    }

    
    function deleteProducto($id) {
        $query = $this->connect()->prepare('DELETE FROM producto WHERE IDproducto = ?');
        $query->execute([$id]);
    }
}