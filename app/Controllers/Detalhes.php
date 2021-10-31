<?php

namespace App\Controllers;

class Detalhes extends BaseController
{

    public function index($id = null)
    {
        #chama a view
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



            $cart = new \App\Models\ProductsCartModel();
            $prods = $cart->findByidCart($_SESSION['user']['idCart']);

            return redirect()->to(site_url("Checkout/ProdutosCarrinho/$idCate/$idLoja"));
            $categorias = new \App\Models\CategoriaNegocioModel();
            $arr['categoria'] = $categorias->findAll();
            return view('detalhes', $arr);

            
        }
    }
}
