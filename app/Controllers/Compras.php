<?php

namespace App\Controllers;

class Compras extends BaseController
{

    public function index($id = null)
    {
        if (isset($_SESSION["user"])) {

            $pedidoModel = new \App\Models\PedidoModel();
            $produtosPedidoModel = new \App\Models\ProdutosPedidoModel();
            $lojasModel = new \App\Models\LojaModel();

            $pedidos = $pedidoModel->findByUsuario($_SESSION['user']['id']);


            foreach ($pedidos as $pedido) {
                $produtos = $produtosPedidoModel->findByPedido($pedido['IdPedido']);
                $cont = 0;
                $resultado = null;
                $prod = null;
                foreach ($produtos as $produto) {
                    $loja = $lojasModel->find($produto['IdLoja']);
                    $link = $loja['LinkServico'];
                    //Lista os pedidos de um usuario pelo seu ID

                    $url = $link . "listarProdutosPorId/{$produto['IdProduto']}";
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                    //Json para Array 
                    $resultado[] = json_decode(curl_exec($ch), true);

                    $prod[] = [
                        "descricaoProduto" => $resultado[$cont]["descricaoProduto"],
                        "idCategoriaProd" => $resultado[$cont]["idCategoriaProd"],
                        "idLoja" => $resultado[$cont]["idLoja"],
                        "idProduto" => $resultado[$cont]["idProduto"],
                        "imagenProduto" => $resultado[$cont]["imagenProduto"],
                        "nomeProduto" => $resultado[$cont]["nomeProduto"],
                        "precoProduto" => $resultado[$cont]["precoProduto"],
                        "quantidade" => $produto["Quantidade"],
                        "precoTotal" => $produto["PrecoTotal"]

                    ];

                    $cont++;
                }


                $ped[] = [
                    "produtos" => $prod,
                    "pedido" => $pedido
                ];
            }

            if(isset($ped)){
                $arr['pedido'] = $ped;
                $arr['loja'] = $lojasModel->findAll();
            }
            




            $categorias = new \App\Models\CategoriaNegocioModel();
            $arr['categoria'] = $categorias->findAll();


            return view('compras', $arr);
        } else {
            return redirect()->to(site_url("Login/index"));
        }
    }


    public function pedidos()
    {
        if (isset($_SESSION["shopkeeper"])) {
            $idLoja = (int) $_SESSION['shopkeeper']['id'];

            $lojaModel = new \App\Models\LojaModel();
            $loja = $lojaModel->find($idLoja);

            $servivosModel = new \App\Models\ServicosModel();

            $servico = $servivosModel->find($loja["IdServico"]);
            $link = $servico["LinkServico"];

            $url = $link . "listarPedidoLoja/$idLoja";

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            //Json para Array 
            $resultado[] = json_decode(curl_exec($ch), true);



            foreach ($resultado as $key) {
                foreach ($key as $chave) {


                    $data = substr($chave["dataPEdido"], 0, -1);
                    $data = date_create($data);
                    $data = date_format($data, 'd/m/Y');

                    //Adiciona os ID's a array 
                    $pedido[] = [
                        "idPedido"  => $chave["idPedido"],
                        "Total"     => $chave["total"],
                        "idUser"    => $chave["idUsuario"],
                        "finalizado" => $chave["finalizado"],
                        "data" => $data
                    ];
                }
            }

           


            if (isset($pedido)) {
                //Foreach para cada pedido
                foreach ($pedido as $key => $item) {
                    $id = $item["idPedido"];

                    $url = $link . "listarProdutosPedido/$id";
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                    //Json para Array 
                    $resu[] = json_decode(curl_exec($ch), true);


                    $idUser = $item["idUser"];
                    $usersModel = new \App\Models\ValidationModel();
                    $user = $usersModel->find($idUser);
                    $userArr[] = $user;
                }
               
                $categorias = new \App\Models\CategoriaNegocioModel();
                $odio['categoria'] = $categorias->findAll();
                $odio['pedido'] = $pedido;
                $odio['resultado'] =  $resu;
                //print "<pre>";
                //print_r($resu);
                //die();
                $odio['users'] = $userArr;

                return view('compras', $odio);
            } else {
                $categorias = new \App\Models\CategoriaNegocioModel();
                $odio['categoria'] = $categorias->findAll();
                return view('compras', $odio);
            }
        }
    }


    public function statusPedido($idUser = null, $idPedido, $finalizado, $idLoja = null)
    {
        if ($idLoja != null) {
            $lojaModel = new \App\Models\LojaModel();
            $loja = $lojaModel->find($idLoja);

            $servivosModel = new \App\Models\ServicosModel();

            $servico = $servivosModel->find($loja["IdServico"]);
            $link = $servico["LinkServico"];

            $finalizado = (int) $finalizado;

            $url = $link."mudarStatus/$idPedido/$finalizado";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            //Json para Array 
            $resu = json_decode(curl_exec($ch), true);
            
            $pedidoModel = new \App\Models\PedidoModel();
            
            $a = $pedidoModel->findById($_SESSION['user']['id'], $idPedido);
            $a["Status"] = $finalizado; 
            $pedidoModel->update($idPedido, $a);

        }else{
            $idLoja = (int) $_SESSION['shopkeeper']['id'];

            $lojaModel = new \App\Models\LojaModel();
            $loja = $lojaModel->find($idLoja);
    
            $servivosModel = new \App\Models\ServicosModel();
    
            $servico = $servivosModel->find($loja["IdServico"]);
            $link = $servico["LinkServico"];
    
            $finalizado = (int) $finalizado;
            $url = $link."mudarStatus/$idPedido/$finalizado";

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
            //Json para Array 
            $resu = json_decode(curl_exec($ch), true);

            $pedidoModel = new \App\Models\PedidoModel();
            
            $a = $pedidoModel->findById($$idUser, $idPedido);
            $a["Status"] = $finalizado; 
            $pedidoModel->update($idPedido, $a);
        }
        

        if (isset($_SESSION["shopkeeper"])) {
            return redirect()->to(site_url("Compras/pedidos"));
        } else if (isset($_SESSION["user"])) {
            return redirect()->to(site_url("Compras/index"));
        }
    }
}
