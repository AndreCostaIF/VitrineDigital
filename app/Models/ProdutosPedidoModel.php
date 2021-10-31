<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class ProdutosPedidoModel extends Model {

        
        protected $table = 'produtospedido';
        
        protected $primaryKey = 'IdProdPed';
        protected $returnType = 'array';
        
        protected $allowedFields = ['IdPedido', 'IdProduto', 'Quantidade','PrecoUnitario', 'PrecoTotal', 'IdLoja'];
        protected $useTimestamps = false;
        

        public function findByPedido($idPedido)
        {
            $this->where("IdPedido", $idPedido);
            return $this->findAll();
        }

        public function findByProduto($idPedido, $idProduto)
        {   
            $this->where("IdProduto", $idProduto);
            $this->where("IdPedido", $idPedido);
            return $this->findAll();
        }
        
        
    
    }