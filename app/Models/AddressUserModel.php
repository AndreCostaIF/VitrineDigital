<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class AddressUserModel extends Model {

        
        protected $table = 'endereco';
        
        protected $primaryKey = 'IdEndereco';
        protected $returnType = 'array';
        
        protected $allowedFields = ['Rua', 'Numero', 'Bairro', 'Cidade', 'UF'];
        protected $useTimestamps = false;

        

        public function findByEmail($email){
            $this->select("emailUsuario");
            $this->where("emailUsuario", $email);
            return $this->first();
        }

        public function findAddresById($id){
            $this->select("Rua");
            $this->select("Numero");
            $this->select("Bairro");
            $this->select("Cidade");
            $this->select("UF");
            $this->where("IdEndereco", $id);
            return $this->first();
        }

        
        
    
    }