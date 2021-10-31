<?php

namespace App\Controllers;

class Portal extends BaseController{

    public function index($id = null){
        $categorias = new \App\Models\CategoriaNegocioModel();
        $res['categoria'] = $categorias->findAll();
        #chama a view
        return view('portal', $res);
    }
}