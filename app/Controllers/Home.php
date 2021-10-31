<?php namespace App\Controllers;

class Home extends BaseController {
	public function index($id = null, $arr = null){
		#chama o model
		$categorias = new \App\Models\CategoriaNegocioModel();
		$categore['categoria'] = $categorias->findAll();
	
	
		#chama a view
		return view('index', $categore);
		}
}

