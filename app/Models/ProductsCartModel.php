<?php 
    namespace App\Models;
    use CodeIgniter\Model;
    
    class ProductsCartModel extends Model {

        
        protected $table = 'produtoscarrinho';
        
        protected $primaryKey = 'IdProdutoCarrinho';
        protected $returnType = 'array';
        
        protected $allowedFields = ['IdCarrinho', 'IdProduto', 'quantidade', 'precoTotal', 'finalizado', "IdLoja"];
        protected $useTimestamps = false;


        
        public function findByidCart($id)
        {
            $this->where("IdCarrinho", $id);
            return $this->findAll();
        }
        public function findByProduto($idCart, $idProd)
        {
            $this->where("IdCarrinho", $idCart);
            $this->where("IdProduto", $idProd);
            return $this->findAll();
        }
    
    }