<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class PedidoModel extends Model {

        
        protected $table = 'pedido';
        
        protected $primaryKey = 'IdPedido';
        protected $returnType = 'array';
        
        protected $allowedFields = ['DataPedido', 'TotalPedido', 'Status','IdUsuario'];
        protected $useTimestamps = false;

        public function findByUsuario($idUsuario)
        {
            $this->where("IdUsuario", $idUsuario);
            return $this->findAll();
        }

        public function findById($idUsuario, $idPedido)
        {
            $this->where("IdUsuario", $idUsuario);
            $this->where("IdPedido", $idPedido);
            return $this->findFirst();
        }

        
    
    }