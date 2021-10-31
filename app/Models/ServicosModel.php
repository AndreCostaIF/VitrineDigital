<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class ServicosModel extends Model {

        
        protected $table = 'servicos';
        
        protected $primaryKey = 'IdServico';
        protected $returnType = 'array';
        
        protected $allowedFields = ['LinkServico', 'nomeServico'];
        protected $useTimestamps = false;


        
    
    }