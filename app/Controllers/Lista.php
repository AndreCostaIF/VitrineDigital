<?php

namespace App\Controllers;

class Lista extends BaseController
{

    public function index($id = null)
    {
        $categorias = new \App\Models\CategoriaNegocioModel();
		
        $idLoja = (int)$id;
        
        
        $lojaModel = new \App\Models\LojaModel();
        $loja = $lojaModel->find($idLoja);

        $servicoModel = new \App\Models\ServicosModel();
        $servicoLoja = $servicoModel->find($loja['IdServico']);
        $link = $servicoLoja['LinkServico'];
        
        $url = $link."listarCategorias/$idLoja";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     
        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);

        //Dados do Back para serem enviados para View
        $res['resultado'] = $resultado;
        $res['idLoja'] = $idLoja;
        $res['categoria'] = $categorias->findAll();

        #chama a view
        return view('list', $res);
    }
}
