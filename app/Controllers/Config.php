<?php

namespace App\Controllers;

class Config extends BaseController
{
    public function index($id = null, $arr = null)
    {
        #chama o model
        $categorias = new \App\Models\CategoriaNegocioModel();
        $categore['categoria'] = $categorias->findAll();

        #chama a view
        return view('config', $categore);
    }


    public function tema($tema = null){

        if (isset($_POST['tema']))
            $tema = $_POST['tema'];

        if ($tema == 'Dark') {
            $_SESSION["user"]["theme"] = "styleDark.css";
            return 200;
        } elseif ($tema == 'Light') {
            $_SESSION["user"]["theme"] = "style.css";
            return 200;
        } else {
            //caso se chegar algo diferente do esperado no post
            //retorna um codigo de erro
            return 500;
        }
    }
}
