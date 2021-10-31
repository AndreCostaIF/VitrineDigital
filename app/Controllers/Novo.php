<?php

namespace App\Controllers;

class Novo extends BaseController{

    public function index($produto = null){
        //verifica se acessão de lojista
        if(isset($_SESSION['shopkeeper'])){

        $id = (int)$_SESSION['shopkeeper']['id'];
        $categorias = new \App\Models\CategoriaNegocioModel();

        $lojaModel = new \App\Models\LojaModel();
        $lojas = $lojaModel->find($id);
        
        $servicoModel = new \App\Models\ServicosModel();
        $servicoLoja = $servicoModel->find($lojas['IdServico']);
        $link = $servicoLoja["LinkServico"];
       
            
        $url = $link."listarCategorias/$id";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        
       
        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);
        
        $res['categorias'] = $resultado;
        $res['produto'] = $produto;
        $res['categoria'] = $categorias->findAll();
        #chama a view
        return view('new',$res);
        }else{
            return redirect()->to(site_url("Home/index"));  
        }
    }

    public function salvar($idProduto = null){
       
        $post = $this->request->getPost(null,FILTER_SANITIZE_STRING);
        $idLoja = (int)$_SESSION['shopkeeper']['id'];
        $lojaModel = new \App\Models\LojaModel();
        $lojas = $lojaModel->find($idLoja);
        
        $servicoModel = new \App\Models\ServicosModel();
        $servicoLoja = $servicoModel->find($lojas['IdServico']);
        $link = $servicoLoja["LinkServico"];

        if(isset($post["idProduto"])){
            $id = (int)$post["idProduto"];
            
            $file = $this->request->getFile('imagem');
            $path = 'image/produtos/';
            $file->move(ROOTPATH."public/".$path);
            $post['imagem'] = $path.$file->getName();
           
            $data = [
               "id"         => $id,
               "nome"       => $post["nome"],
               "quant"      => $post["quant"],
               "desc"       => $post["desc"],
               "preco"      => $post["preco"],
               "idCate"     => $post["idCate"],
               "imagem"     => $post["imagem"]
            ];
            //array para json
            $payload = json_encode($data);
            
            
       
            
            $url = $link."listarCategorias/editarProd";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLINFO_HEADER_OUT, true);
            // Use POST request
            curl_setopt($ch, CURLOPT_POST, true);
    
            // Set payload for POST request
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    
            // Set HTTP Header for POST request 
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: application/json', 
                    'Content-Length: ' . strlen($payload)
                )
            );
            //Json para Array 
            $resultado = json_decode(curl_exec($ch), true);
           
            //Dados do Back para serem enviados para View
            $res = $resultado[0];
            
            return redirect()->to(site_url("Novo/listaProdutos/$res"));
        
        }else{

        $id = (int)$_SESSION['shopkeeper']['id'];

        $file = $this->request->getFile('imagem');
		$path = 'image/produtos/';
		$file->move(ROOTPATH."public/".$path);
		$post['imagem'] = $path.$file->getName();
        
        $data = [
           "idLoja"     => $id,
           "nome"       => $post["nome"],
           "quant"      => $post["quant"],
           "desc"       => $post["desc"],
           "preco"      => $post["preco"],
           "idCate"     => $post["idCate"],
           "imagem"     => $post["imagem"]
        ];
       
        //array para json
        $payload = json_encode($data);

        $url = $link."inserirProd";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        // Use POST request
        curl_setopt($ch, CURLOPT_POST, true);

        // Set payload for POST request
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set HTTP Header for POST request 
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json', 
                'Content-Length: ' . strlen($payload)
            )
        );
        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);
        
        //Dados do Back para serem enviados para View
        $res = $resultado[0];
        
        return redirect()->to(site_url("Novo/index/$res"));

        #chama a view
    }
 }


    public function categoria($id = null){
        $categorias = new \App\Models\CategoriaNegocioModel();
        $res['categoria'] = $categorias->findAll();
        #chama a view
        return view('category',  $res);
    }

    public function saveCategory($id = null){
        $categorias = new \App\Models\CategoriaNegocioModel();

		$idLoja = (int)$_SESSION['shopkeeper']['id'];
        $lojaModel = new \App\Models\LojaModel();
        $lojas = $lojaModel->find($idLoja);
        
        $servicoModel = new \App\Models\ServicosModel();
        $servicoLoja = $servicoModel->find($lojas['IdServico']);
        $link = $servicoLoja["LinkServico"];

        $post = $this->request->getPost(null,FILTER_SANITIZE_STRING);
        $id = (int)$_SESSION['shopkeeper']['id'];

        $file = $this->request->getFile('imagem');
		$path = 'image/produtos/category/';
		$file->move(ROOTPATH."public/".$path);
		$post['imagem'] = $path.$file->getName();
        
        $data = [
           "idLoja"     => $id,
           "nome"       => $post["categoria"],
           "imagem"     => $post['imagem']
           
        ];
        //array para json
        $payload = json_encode($data);

        $url = $link."inserirCate";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        // Use POST request
        curl_setopt($ch, CURLOPT_POST, true);

        // Set payload for POST request
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set HTTP Header for POST request 
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json', 
                'Content-Length: ' . strlen($payload)
            )
        );
        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);

        //Dados do Back para serem enviados para View
        $res['resultado'] = $resultado;
        $res['categoria'] = $categorias->findAll();
        
        #chama a view
        return view('category', $res);
    }

    public function listaProdutos($var = null){
        $idLoja = (int)$_SESSION['shopkeeper']['id'];
        $categorias = new \App\Models\CategoriaNegocioModel();
        
        $idLoja = (int)$_SESSION['shopkeeper']['id'];
        $lojaModel = new \App\Models\LojaModel();
        $lojas = $lojaModel->find($idLoja);
        
        $servicoModel = new \App\Models\ServicosModel();
        $servicoLoja = $servicoModel->find($lojas['IdServico']);
        $link = $servicoLoja["LinkServico"];
            
        $url = $link."listarTodosProdutos/$idLoja/";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);
        

        $urlCate = $link."listarCategorias/$idLoja";
        $chCate = curl_init($urlCate);
        curl_setopt($chCate, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chCate, CURLOPT_SSL_VERIFYPEER, false);   
        
       
        //Json para Array 
        $Categorias = json_decode(curl_exec($chCate), true);
        
        $res['produtos'] = $resultado;
        $res['categorias'] = $Categorias;
        $res['categoria'] = $categorias->findAll();
        
        return view('productList', $res);
    }

    public function DeleteProduto($id = null){
        $idLoja = (int)$_SESSION['shopkeeper']['id'];
        $lojaModel = new \App\Models\LojaModel();
        $lojas = $lojaModel->find($idLoja);
        
        $servicoModel = new \App\Models\ServicosModel();
        $servicoLoja = $servicoModel->find($lojas['IdServico']);
        $link = $servicoLoja["LinkServico"];

        $url = $link."deleteProd/$id/";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);

        return redirect()->to(site_url("Novo/listaProdutos"));
    }
}