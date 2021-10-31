<?php include 'masthead.php'; ?>
<div class="container">
<div class="row-fluid">
      <div class="block">
            <div class="navbar navbar-inner block-header">
                  <div class="muted pull-left">Portal do Parceiro</div>

            </div>
            <div class="block-content collapse in">
                  <div class="span12">
                        <div class="alert alert-info">Já sou parceiro
                              <a href="<?= site_url("Portal/index") ?>" class="btn">Entrar</a>
                        </div>

                        <div class="block-content collapse in">
                              <div class="span12">
                                    <div class="alert alert-info"><span class="text-error">*</span> Campos requiridos</div>
                                    <form class="form-horizontal" action="<?= site_url("partner/salvar") ?>" method="post" enctype="multipart/form-data">

                                          <div class="control-group">
                                                <label for="NomeLojista">Nome <span class="text-error">*</span></label>
                                                <input type="text" name='NomeLojista' id="name" value="" placeholder="Nome Completo" required="required">
                                          </div>

                                          <div class="control-group">
                                                <input type="hidden" name="id" value="">
                                                <label for="UserLojista">Usuário<span class="text-error">*</span></label>
                                                <input type="text" name="UserLojista" id="usuario" value="" placeholder="Usuário" required="required">
                                                <div style='color:red;' id="usernameMsg"><?= session('errors.UserLojista') ?></div>
                                          </div>

                                          <div class="control-group">
                                                <label for="SenhaLojista">Senha <span class="text-error">*</span></label>
                                                <input type="password" name="SenhaLojista" id="SenhaLojista" value="" placeholder="Senha" required="required">
                                                <div style='color:red;'><?= session('errors.SenhaLojista') ?></div>
                                          </div>

                                          <div class="control-group">
                                                <label for="name">CNPJ <span class="text-error">*</span></label>
                                                <input type="text" id="cnpj" name="CNPJ" value="" placeholder="CNPJ" required="required">
                                          </div>

                                          <div class="control-group">
                                                <label for="NomeFantasia">Nome fantasia<span class="text-error">*</span></label>
                                                <input type="text" name="NomeFantasia" id="nome fantasia" value="" placeholder="Nome fantasia" required="required">
                                          </div>

                                         

                                          <div class="control-group">
                                                <label for="RazaoSocial">Razão Social<span class="text-error">*</span></label>
                                                <input type="text" name="RazaoSocial" id="razão social" value="" placeholder="Razão Social" required="required">
                                          </div>

                                          <div class="control-group">
                                                <label for="IdCategoriaNegocio">Escolha a categoria da sua loja<span class="text-error">*</span></label>
                                                <div class="row-fluid">
                                                      <div class="span3">

                                                            <select name="IdCategoriaNegocio">
                                                                  <option value=""> -- Escolha -- </option>
                                                                  <?php foreach ($categoria as $key => $item) :
                                                                        $selected = $item['IdcategoriaNegocio'];

                                                                  ?>
                                                                        <option <?= $selected ?> value="<?=  $selected ?>"><?= $item["NomeCategoriaNegocio"] ?></option>
                                                                  <?php endforeach; ?>
                                                            </select>
                                                      </div>
                                                </div>
                                          </div>

                                          <div class="control-group">
                                                <label for="Logo">Logo (230x200) <span class="text-error">*</span></label>
                                                <input type="file" name='Logo' id="Logo" value=""  required="required">
                                          </div>

                                          <div class="control-group">
                                                <label for="Rua">Rua <span class="text-error">*</span></label>
                                                <input type="text" id="Rua" name="Rua" value="" placeholder="Rua" required="required">
                                          </div>

                                          <div class="control-group">
                                                <label for="Numero">Número</label>
                                                <input type="number" name="Numero" id="Numero" value="" placeholder="Número" required="required">
                                          </div>

                                          <div class="control-group">
                                                <label for="Bairro">Bairro <span class="text-error">*</span></label>
                                                <input type="text" name="Bairro" id="Bairro" value="" placeholder="Bairro" required="required">
                                          </div>

                                          <div class="control-group">
                                                <label for="Cidade">Cidade <span class="text-error">*</span></label>
                                                <input type="text" name="Cidade" id="Cidade" value="" placeholder="Cidade" required="required">
                                          </div>

                                          <div class="control-group">
                                                <label for="UF">UF <span class="text-error">*</span></label>
                                                <input type="text" name="UF" id="UF" value="" placeholder="Estado" required="required">
                                          </div>

                                          <div class="control-group">
                                                <label for="LinkServico">URL WebService<span class="text-error">*</span></label>
                                                <div class="row-fluid">
                                                      <div class="span3">

                                                            <select name="IdServico">
                                                                  <option value=""> -- Escolha -- </option>
                                                                  <?php foreach ($servicos as $key => $item) :
                                                                        $selected = $item['IdServico'];

                                                                  ?>
                                                                        <option <?= $selected ?> value="<?=  $selected ?>"><?= $item["nomeServico"] ?></option>
                                                                  <?php endforeach; ?>
                                                            </select>
                                                      </div>
                                                </div>
                                          </div>

                                          <div class="control-group">
                                                <label for="TelefoneLo1">Telefone <span class="text-error">*</span></label>                                                      
                                                <input type="text" name="Telefone" id="Telefone" value="" placeholder="Telefone" class="input-medium" required="required">
                                                      
                                          </div>
                                          <div class="control-group">
                                                <div class="controls">
                                                      <button type="submit" class="btn btn-primary">Ser Parceiro</button>
                                                </div>
                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>


<?php include 'footer.php';?>