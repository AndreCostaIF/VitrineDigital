<?php

namespace App\Controllers;

class View extends BaseController{

    public function index($id = null){
        $categorias = new \App\Models\CategoriaNegocioModel();
        $res['categoria'] = $categorias->findAll();
        #chama a view
        return view('view',  $res);
    }
}