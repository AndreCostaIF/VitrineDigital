<?php

namespace App\Controllers;

class Order_complete extends BaseController{

    public function index($id = null){
        #chama a view
        $categorias = new \App\Models\CategoriaNegocioModel();
        $res['categoria'] = $categorias->findAll();
        return view('order-complete', $res);
    }
}