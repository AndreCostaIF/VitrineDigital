<?php 
    namespace App\Models;
    use CodeIgniter\Model;
    class ValidationModel extends Model {

        
        protected $table = 'usuariofinal';
        
        protected $primaryKey = 'IdUsuario';
        protected $returnType = 'array';
        
        protected $allowedFields = ['NomeUsuario', 'EmailUsuario', 'ImagenUsuario', 'IdCarrinho', 'Telefone', 'IdEndereco'];
        protected $useTimestamps = false;
        protected $beforeFind = ['beforeFind'];

        public function findByEmail($email){
            $this->select("EmailUsuario");
            $this->select("ImagenUsuario");
            $this->where("EmailUsuario", $email);
            return $this->first();
        }

        public function logar(array $dados){
           
            $this->where("EmailUsuario", $dados["emailUsuario"]);
            return $this->first();
        }
        
        public function beforeFind($obj){
            $this->select("usuariofinal.*, endereco.*");
            $this->join("endereco", "endereco.IdEndereco = usuariofinal.IdEndereco", "inner");
            
            return $obj;
        }
    
    }