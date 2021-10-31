<?php

namespace App\Controllers;

class Personal extends BaseController{

    public function index($id = null){
        $categorias = new \App\Models\CategoriaNegocioModel();
		$arr['categoria'] = $categorias->findAll();
        
        if(isset($_SESSION["shopkeeper"])){
            $loja = new \App\Models\LojaModel();
            $user = $loja->find($id);

        }else if(isset($_SESSION["user"])){
            $userClient = new \App\Models\ValidationModel();
            $user = $userClient->find($id);
        }
        
        
       
        $arr["user"] = $user;
        
        return view('personal', $arr);
    }
}
?>