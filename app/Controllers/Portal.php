<?php

namespace App\Controllers;

class Portal extends BaseController{

    public function index($id = null){
        #chama a view
        $categorias = new \App\Models\CategoriaNegocioModel();
        $res['categoria'] = $categorias->findAll();
        return view('portal',  $res);
    }

    public function logar(){
       
        $post = $this->request->getPost(null,FILTER_SANITIZE_STRING);
        $lojista = new \App\Models\LojistaModel();  
        $loja = new \App\Models\LojaModel();   
       // $web = new \App\Models\ServicosModel();         

                $client = $lojista->logar($post);
                if($client == NULL){//TROCAR ESSE TRATAMENTO DE ERRO
                    $this->session->setFlashdata('erro', 'Login ou senha inválida.');  
                    $categorias = new \App\Models\CategoriaNegocioModel();
                    $res['categoria'] = $categorias->findAll();
                    return view('portal',  $res);
                }else{
                    $store = $loja->findById($client["IdLojista"]);
                    
               
                    var_dump($client["IdLojista"]);
                    $_SESSION["shopkeeper"]                 = [];
                    $_SESSION["shopkeeper"]["name"]         = $client["NomeLojista"];
                    $_SESSION['shopkeeper']['id']           = $store["IdLoja"];
                    $_SESSION['shopkeeper']['storeName']    = $store["NomeFantasia"];
                             
    
                    return redirect()->to(site_url("Index/index/"));
                }
               

                        
        
    }

    public function logout(){ 
        session_destroy(); 
        return redirect()->to(site_url("Index/index"));
    }


}