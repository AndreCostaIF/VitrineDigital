<?php

namespace App\Controllers;

class Contactus extends BaseController{

    public function index($id = null){
        #chama a view
        return view('contactus');
    }
}