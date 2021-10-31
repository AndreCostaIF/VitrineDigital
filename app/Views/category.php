<?php include 'masthead.php'; ?>
<div class="container">
<div class="row-fluid">
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Voltar para o Cadastro de produtos
                <div class="alert alert-info"><a href="<?= site_url("Novo/index")?>"> Cadastro de produtos</a> </div></div>

        </div>
        
        <div class="block-content collapse in">
            <div class="span12">
                <?php if (isset($resultado) && $resultado != NULL) : ?>
            <script>
                alert("categoria inserida!");
            </script>
            <?php elseif(isset($resultado) && $resultado == NULL): ?>
                <script>
                alert("ERRO: categoria NÃO inserida!");
            </script>
            <?php endif;?>
               
                <div class="block-content collapse in">
                    <div class="span12">
                        <div class="alert alert-info">Informe a categoria
                            
                        </div>

                        <form class="form-horizontal" action="<?= site_url("Novo/saveCategory") ?>" method="post" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label" for="name">Categoria</label>
                                <input type="hidden" name="idLoja" value="<?php  $_SESSION['shopkeeper']['id'] ?>">
                                <input type="text" name="categoria" id="Categoria" placeholder="Nome categoria" required="required">
                             </div> 

                             <div class="control-group">
                                <label class="control-label" for="name">Imagem da Categoria</label>
                               
                                <input type="file" name="imagem" required="required">
                             </div> 
                                
                               
                                
                                
                               
                                
                                
                           <br>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    
                                </div>
                            </div>

                        </form>
                        



                    </div>
                </div>

               



            
          
        
      </div>

        
           

      <?php include 'footer.php';?>