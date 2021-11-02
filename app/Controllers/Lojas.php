<?php

namespace App\Controllers;

class Lojas extends BaseController{

    public function index($id = null){
        #chama a view
        $categorias = new \App\Models\CategoriaNegocioModel();
        $res['categoria'] = $categorias->findAll();
        
        $loja = new \App\Models\LojaModel();
        $lojaAddress = new \App\Models\AddressUserModel();
       
        $shop['lojas'] = $loja->findAllById($id);
        $cont=0;
        foreach($shop['lojas'] as $key){
           
           array_push($shop['lojas'][$cont],
                        $lojaAddress->findAddresById($key["IdEndereco"]));
            $cont++;
        }//echo "<pre>";var_dump($shop['lojas'][0][0]["Rua"]);
        
        
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