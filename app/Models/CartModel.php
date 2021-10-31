<?php 
    namespace App\Models;
    use CodeIgniter\Model;
    
    class CartModel extends Model {

        
        protected $table = 'carrinho';
        
        protected $primaryKey = 'IdCarrinho';
        protected $returnType = 'array';
        
        protected $allowedFields = ['QuantProduto', 'PrecoTotal', 'finalizado'];
        protected $useTimestamps = false;


        
        
    
    }