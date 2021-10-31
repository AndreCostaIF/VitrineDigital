<?php

namespace App\Controllers;

class Lojas extends BaseController{

    public function index($id = null){
        #chama a view
        $categorias = new \App\Models\CategoriaNegocioModel();
        $res['categoria'] = $categorias->findAll();
        
        $loja = new \App\Models\LojaModel();
       
        $shop['lojas'] = $loja->findAllById($id);
        $shop['categoria'] = $categorias->findAll();
        return view('lojas',  $shop);
        
    }

    public function listar($id = null){
        #chama a view
        $categorias = new \App\Models\CategoriaNegocioModel();
       
        $loja = new \App\Models\LojaModel();
       
        $shop['lojas'] = $loja->findAll();
        $shop['categoria'] = $categorias->findAll();
        
        return view('lojas',  $shop);
    }
}