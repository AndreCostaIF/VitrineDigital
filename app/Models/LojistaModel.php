<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class LojistaModel extends Model {

        
        protected $table = 'lojista';
        
        protected $primaryKey = 'IdLojista';
        protected $returnType = 'array';
        
        protected $allowedFields = ['UserLojista', 'SenhaLojista', 'NomeLojista'];
        protected $useTimestamps = false;

        protected $beforeInsert = ['hashPassword']; 
        protected $beforeUpdate = ['hashPassword'];
        
        protected function hashPassword(array $senha) { 
            #se o TOKEN nao tiver sido enviado, não faz nada 
            if ($senha['data']['SenhaLojista'] == "") { 
                return $senha; 
            }
            #caso contrário, criptografa 
            $senha['data']['SenhaLojista'] = sha1($senha['data']['SenhaLojista']); 
            return $senha; 
        }

        public function findUser($user){
            $this->select("UserLojista");
            $this->where("UserLojista", $user);
            return $this->first();
        }

        

        public function logar(array $dados){
            $senha = sha1($dados["SenhaLojista"]);
            $this->where("UserLojista", $dados["UserLojista"]);
            $this->where('SenhaLojista', $senha);
            return $this->first();
        }


        public function logout(){ 
            session_destroy(); 
            return redirect()->to(site_url("Index/index"));
        }
        
    
    }