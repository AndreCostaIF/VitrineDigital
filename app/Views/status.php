<?php include 'masthead.php';?>
<div class="container">
        <div class="row-fluid">
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Portal do Parceiro</div>
                    
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <div class="alert alert-info">Entre com seu usuário e senha ou
                          <a href="<?=site_url("Partner/index")?>" class="btn">Seja Parceiro</a></div>
                    
                        <form class="form-horizontal" action='#'>
                          <div class="control-group">
                            <label class="control-label" for="name">Usuário</label>
                            <div class="controls">
                              <input type="text" id="name" placeholder="Usuário" required="required">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="password">Senha</label>
                            <div class="controls">
                              <input type="password" id="password" placeholder="Senha" required="required">
                            </div>
                          </div>
                          
                          <div class="control-group">
                            <div class="controls">
                              <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                          </div>  
                             
                        </form>
                                
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span5">
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Dúvidas?</div>
                        <div class="pull-right">Ajuda!</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <ul class="unstyled">
                              <li><i class="icon-chevron-right"></i> <a href="<?=site_url("Contactus/index")?>">Fale Conosco</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php';?>