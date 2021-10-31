<?php

namespace App\Controllers;

class AddressUser extends BaseController
{

    public function index($id = null)
    {
        $categorias = new \App\Models\CategoriaNegocioModel();
        $arr['categoria'] = $categorias->findAll();

        if (isset($_SESSION["shopkeeper"])) {
            $loja = new \App\Models\LojaModel();
            $user = $loja->find($id);
        } else if (isset($_SESSION["user"])) {
            $userClient = new \App\Models\ValidationModel();
            $user = $userClient->find($id);
        }



        $arr["user"] = $user;

        return view('addressUser', $arr);
    }

    public function salvar()
    {


        if (isset($_POST)) {

            $endereco = new \App\Models\AddressUserModel();
            $add = $this->request->getPost(null, FILTER_SANITIZE_STRING);


            $address = [
                'Rua'           => "$add[Rua]",
                'Numero'        => "$add[Numero]",
                'Bairro'        => "$add[Bairro]",
                'Cidade'        => "$add[Cidade]",
                'UF'            => "$add[UF]",
            ];

            $endereco->save($address);
            $idEnderco = $endereco->getInsertID();
            $CartClient = new \App\Models\CartModel();
            $userClient = new \App\Models\ValidationModel();

            $cart = ["QuantProduto" => 0, "PrecoTotal" => 0, "finalizado" => false];

            $CartClient->save($cart);
            $idCart = $CartClient->getInsertID();
            $nome = $add["name"] . $add["LastName"];
            if (strstr($nome, ' ') == false) {
                $nome = $add["name"] . " " . $add["LastName"];
            }
            //Cria uma string aleatoria
            $Random_str = uniqid();
            
            //salva a ft do usuario no servidor
            $url = $_SESSION["user"]["photo"];
            $ch = curl_init($url);
            $fp = fopen("image/users/$Random_str.jpg", 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);
            $session =  session();
           // $_SESSION["user"]["photo"] = "image/users/$Random_str.jpg";
            $session->push("user", ['photo'=> "http://localhost/VitrineDigital/Vitrine/public/"."image/users/$Random_str.jpg"]);

            
            $usuario = [

                'NomeUsuario'    => $nome,
                'EmailUsuario'   => $add["email"],
                'ImagenUsuario'  => $_SESSION["user"]["photo"],
                'IdCarrinho'     => $idCart,
                'IdEndereco'     => $idEnderco,
                'Telefone'       => $add["phone"]

            ];

            $userClient->save($usuario);
            $idUser = $userClient->getInsertID();

            return redirect()->to(site_url("Index/index"));
            //CRIAR MODEL DO ENDEREÇO E SÓ.. E TERMINAR DE SALVAR O ENDEREÇO



        }
    }
}
