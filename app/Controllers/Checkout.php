<?php

namespace App\Controllers;

class Checkout extends BaseController
{

    public function index($arr = null)
    {
        $categorias = new \App\Models\CategoriaNegocioModel();
        $res['categoria'] = $categorias->findAll();

        #chama a view
        //pega o id do carrinho q ta na sessao e lista geral do bando de dados com esse id
        return view('checkout', $res);
    }

    //Lista os produtos da Loja
    public function ListarProdutos($idCate = null, $idLoja = null)
    {
        $idLoja = (int)$idLoja;
        $idCate = (int)$idCate;
        $categorias = new \App\Models\CategoriaNegocioModel();

        $lojaModel = new \App\Models\LojaModel();
        $loja = $lojaModel->find($idLoja);

        $servicoModel = new \App\Models\ServicosModel();
        $servicoLoja = $servicoModel->find($loja['IdServico']);
        $link = $servicoLoja['LinkServico'];

        $url = $link . "listarProdutos/$idCate/$idLoja";
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
        return view('produtos', $res);
    }
    public function ProdutosCarrinho($param = null)
    {
        $categorias = new \App\Models\CategoriaNegocioModel();


        if (isset($_SESSION["user"]["idCart"])) {


            $produtos = new \App\Models\ProductsCartModel();


            $prod = $produtos->findByidCart($_SESSION["user"]["idCart"]);
            $cont = 0;

            $lojaModel = new \App\Models\LojaModel();
            $lojas = $lojaModel->findAll();

            foreach ($lojas as $loja) {

                foreach ($prod as $key) {

                    if ($loja['IdLoja'] == $key["IdLoja"]) {
                        $idProd = $key["IdProduto"];

                        $servicoModel = new \App\Models\ServicosModel();
                        $servicoLoja = $servicoModel->find($loja['IdServico']);
                        $link = $servicoLoja['LinkServico'];

                        $url = $link . "listarProdutosPorId/$idProd";
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                        //Json para Array 
                        $resultado[] = json_decode(curl_exec($ch), true);

                        $arr[] = [
                            "descricaoProduto" => $resultado[$cont]["descricaoProduto"],
                            "idCategoriaProd" => $resultado[$cont]["idCategoriaProd"],
                            "idLoja" => $resultado[$cont]["idLoja"],
                            "idProduto" => $resultado[$cont]["idProduto"],
                            "imagenProduto" => $resultado[$cont]["imagenProduto"],
                            "nomeProduto" => $resultado[$cont]["nomeProduto"],
                            "precoProduto" => $resultado[$cont]["precoProduto"],
                            "quantidade" => $resultado[$cont]["quantidade"],
                            "id" => $key["IdProdutoCarrinho"],
                        ];
                        $cont++;
                    }
                }
            }



            //Dados do Back para serem enviados para View
            if (isset($arr))
                $res['produtos'] = $arr;
            $res['categoria'] = $categorias->findAll();
            $res["param"]  = $param;

            #chama a view

            return view('checkout', $res);
        } else {

            return redirect()->to(site_url("Login/index"));
        }
    }

    public function AdicionarAoCarrinho()
    {
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);

        $idLoja = (int)$post["IdLoja"];
        $idCate = (int)$post["IdCate"];



        if (isset($post["IdCarrinho"])) {

            $data = [
                "IdCarrinho" => (int)$post["IdCarrinho"],
                "IdProduto" => (int)$post["IdProduto"],
                "precoTotal" => (float)$post["preco"],
                "quantidade" => (int)$post["Quantidade"],
                "finalizado" => false,
                "IdLoja" => $idLoja
            ];

            $Prodcart = new \App\Models\ProductsCartModel();
            $Prodcart->save($data);

            $cart = new \App\Models\ProductsCartModel();
            $prods = $cart->findByidCart($_SESSION['user']['idCart']);

            return redirect()->to(site_url("Checkout/ProdutosCarrinho/$idCate/$idLoja"));
        } else {
            return redirect()->to(site_url("Login/index"));
        }
    }


    public function atualizar_total()
    {



        $totais = $_GET["quantidade"] * $_GET["preco"];


        return json_encode($totais);
    }

    public function removerProduto($id)
    {

        $produtos = new \App\Models\ProductsCartModel();

        $produtos->delete($id);
        return redirect()->to(site_url("Checkout/ProdutosCarrinho"));
    }

    public function realizarPedido()
    {
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);

        $lojaModel = new \App\Models\LojaModel();
        //tentei fazer inserir o pedido em sua repectiva aplicação mas essa merda não funciona nem com reza braba


        //trazer os produtos do carrinho
        $prodCart = new \App\Models\ProductsCartModel();
        $produtos = $prodCart->findByidCart($_SESSION['user']['idCart']);
        $cont = 0;


        $pedidoModel = new \App\Models\PedidoModel();
        $produtosPedidoModel = new \App\Models\ProdutosPedidoModel();
        $date = date('Y-m-d H:i:s');
      
        $obj = [
            'DataPedido' => $date,
            'TotalPedido' => 0,
            'Status' => 1,
            'IdUsuario' => $_SESSION['user']['id']
        ];

        $pedidoModel->save($obj);
        $idPedido = $pedidoModel->getInsertID();
        

        
        foreach ($produtos as $key) {
            $lojaModel = new \App\Models\LojaModel();
            $lojas = $lojaModel->find($key['IdLoja']);

            $servicoModel = new \App\Models\ServicosModel();
            $servicoLoja = $servicoModel->find($lojas['IdServico']);
            $link = $servicoLoja["LinkServico"];

            $url = $link."getQuantidade/{$key['IdProduto']}";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            //Json para Array 
            $quantidade = json_decode(curl_exec($ch), true);

       
            
            $idProd = $key['IdProduto'];
            //verificar se a quantidade escolhida está disponivel
            if($post["quant$idProd"] < $quantidade){
                //se tem a quantidade dispovel, salva o pedido
                $savePedido = [
                    'IdPedido' => $idPedido,
                    'IdLoja' => $key['IdLoja'],
                    'IdProduto' =>  $key['IdProduto'],
                    'Quantidade' => $post["quant$idProd"],
                    'PrecoUnitario' => $post["preco$idProd"],
                    'PrecoTotal' => $post["preco$idProd"] * $post["quant$idProd"]
                ];
                $produtosPedidoModel->save($savePedido);
                $id = $key['IdLoja'];
            
                if ($key['IdLoja'] == $post["idLoja$id"]) {

                    $key["quantidade"] = $post["quant$idProd"];
                    $key["precoTotal"] = $post["preco$idProd"] * $post["quant$idProd"];
                    $prodCart->update($key['IdProdutoCarrinho'], $key);

                    $prod["prodLoja$id"][] = [
                        "idProd" => $key['IdProduto'],
                        "quant" => $key["quantidade"],
                        "idloja" => $key["IdLoja"]
                    ];
                }
                $quantDisponivel[] = $key['IdProduto'];
            }else{
                $quantIndisponivel[] = $key['IdProduto'];
            }
            
            

            
        }

        $attTotal = $produtosPedidoModel->findByPedido($idPedido);
        $total = 0;
        foreach($attTotal as $att){
            $total = $total + $att['PrecoTotal'];
        }
         
            
        $pedTotalAtt = $pedidoModel->find($idPedido);
        $pedTotalAtt['TotalPedido'] = $total;
        $pedidoModel->update($idPedido, $pedTotalAtt);
        
        if(isset($prod)){
            foreach ($prod as $key) {
                
            
                $cont = 0;
                foreach($key as $ar){
                    $newArr = null;
                    

                    $arr = [
                        "idUsuario" => $_SESSION['user']['id'],
                        "finalizado" => 1,
                        "idloja" => (int)$key[$cont]['idloja'],
                        "produtos" =>$key
                    ];
                    $cont++;
                }

                
            
            //print "<pre>";
            //print count($ar);
            //print_r($arr["idloja"]);
            //die();
                
                        
                $lojaModel = new \App\Models\LojaModel();
                $lojas = $lojaModel->find($arr['idloja']);


                $servicoModel = new \App\Models\ServicosModel();
                $servicoLoja = $servicoModel->find($lojas['IdServico']);
                $link = $servicoLoja["LinkServico"];

                $payload = json_encode($arr);

                $url = $link . "inserirPedido";
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
                $resultado[] = json_decode(curl_exec($ch), true);
                    
            
                
            } 
        }

        
        if(isset($quantIndisponivel)){
            
            if(isset($quantDisponivel)){
                foreach($quantDisponivel as $key){
                   
                    $produtos = $prodCart->findByProduto($_SESSION['user']['idCart'], $key);
                    foreach ($produtos as $item) {
                        $id = $item['IdProdutoCarrinho'];
                        $prodCart->delete($id);
                    }
                    
                
                }
            }
        }else{

            $produtos = $prodCart->findByidCart($_SESSION['user']['idCart']);
            foreach ($produtos as $item) {
                $id = $item['IdProdutoCarrinho'];
                $prodCart->delete($id);
            }
            
        }           
        
        
        return redirect()->to(site_url("Compras/index"));
    }
}