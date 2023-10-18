<?php

require_once './aplicacion/models/model.php';

class CategoriasModel extends DB {
    function getCategoriasNames() {
        $query = $this->connect()->prepare('SELECT * FROM categoria');
        $query->execute();

        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }

    function insertCategoria($categoria) {
        $query = $this->connect()->prepare('INSERT INTO `categoria` (`CATEGORIA`) VALUES(?)');
        $query->execute([$categoria]);
        return $this->connect()->lastInsertId();
    }
    function updateCategoria($id_categoria,$categoria) {
        $query = $this->connect()->prepare('UPDATE categoria SET CATEGORIA=? WHERE IDcategoria=?');
        $query->execute([$categoria, $id_categoria]);
    }

    
    function deleteCategoria($id) {
        $query = $this->connect()->prepare('DELETE FROM categoria WHERE IDcategoria = ?');
        $query->execute([$id]);
    }
}