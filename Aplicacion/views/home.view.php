<?php

class HomeView {
    public function showHome($producto,$categoria) {
        require 'templates/home.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}