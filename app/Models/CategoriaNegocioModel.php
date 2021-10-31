<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class CategoriaNegocioModel extends Model {

        
        protected $table = 'categorianegocio';
        
        protected $primaryKey = 'IdLoja';
        protected $returnType = 'array';
        
        protected $allowedFields = ['IdcategoriaNegocio', 'NomeCategoriaNegocio'];
        protected $useTimestamps = false;

        


       
    
    }