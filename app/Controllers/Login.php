<?php

namespace App\Controllers;

class Login extends BaseController{

    public function index($id = null){
        $categorias = new \App\Models\CategoriaNegocioModel();
		$categore['categoria'] = $categorias->findAll();
        #chama a view
        return view('login', $categore);
    }
}