<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class LojaModel extends Model {

        
        protected $table = 'loja';
        
        protected $primaryKey = 'IdLoja';
        protected $returnType = 'array';
        
        protected $allowedFields = ['CNPJ', 'NomeFantasia', 'RazaoSocial', 'IdEndereco', 'IdLojista', 'IdCategoriaNegocio', 'Telefone', 'Logo', 'IdServico'];
        protected $useTimestamps = false;
        protected $beforeFind = ['beforeFind'];
        
        public function findById($Id){
            $this->select("NomeFantasia");
            $this->select("IdLoja");
            $this->where("IdLojista", $Id);
            return $this->first();
            
        }

        public function findAllById($Id){
            $this->select("NomeFantasia");
            $this->select("Logo");
            $this->select("IdLoja");
            $this->where("IdCategoriaNegocio", $Id);
            return $this->doFindAll();
            
        }

        public function findAllStore(){
            $this->select("NomeFantasia");
            $this->select("Logo");
            $this->select("IdLoja");
            $this->select("IdCategoriaNegocio");
            
            return $this->doFindAll();
            
        }

        public function beforeFind($obj){
            $this->select("loja.*, endereco.*, servicos.*");
            $this->join("endereco", "endereco.IdEndereco = loja.IdEndereco", "inner");
            $this->join("servicos", "servicos.IdServico = loja.IdServico", "inner");
            return $obj;
        }
        

        
    
    }