<?php

namespace App\Controllers;

class Validation extends BaseController{

    
    public function salvar(){
        $userClient = new \App\Models\ValidationModel();
        
        if(isset($_POST['dados'])) {
            $google = json_decode($_POST['dados'], true);
        
            $userGoogle = [
                'nomeUsuario'   => "$google[userName]",
                'emailUsuario'  => "$google[userEmail]",
                'imagenUsuario' => "$google[userPhoto]"
                
            ];
           $arr["UsuarioGoogle"] = $userGoogle;

            
            
           
         
            if($userClient->findByEmail($userGoogle['emailUsuario']) != NULL){
                
                $client = $userClient->logar($userGoogle);
               
                if($client["NomeUsuario"] != NULL){
                    
                    

                    $_SESSION["user"]               = [];
                    $_SESSION["user"]["name"]       = $userGoogle["nomeUsuario"];
                    $_SESSION["user"]["photo"]      = $client["ImagenUsuario"];
                    $_SESSION["user"]["email"]      = $userGoogle["emailUsuario"];
                    $_SESSION['user']["id"]         = $client["IdUsuario"];
                    $_SESSION['user']["idCart"]     = $client["IdCarrinho"];
                    

                    
                    return json_encode(200);
                        

                  
                }else{
                    return json_encode(200);
                }               
            }else{

                
               
                $_SESSION["user"]           = [];
                $_SESSION["user"]["name"]   = $userGoogle["nomeUsuario"];
                $_SESSION["user"]["photo"]  = $userGoogle["imagenUsuario"];
                $_SESSION["user"]["email"]  = $userGoogle["emailUsuario"];
                
                return json_encode(500);

              
                
                 
            }
        }
        
    } 

    public function logout(){ 
        session_destroy(); 
        return redirect()->to(site_url("Index/index"));
    }
}