<?php include 'masthead.php'; ?>
<div class="container">
<?php foreach ($produtos as $key => $item) : ?>
  <?php $desc = $item["descricaoProduto"]; ?>
<div class="row-fluid">
      <div class="block">
        <div class="navbar navbar-inner block-header">
          <div class="muted pull-left">Adicionar produtos</div>
          <div class="pull-right"><a href="<?= site_url("Novo/index") ?>" id="produto">Adicionar Produtos</a></div>
        </div>
        <div class="block-content collapse in">
          <div class="span12">
            
            
            
            <?php if (isset($produto) && $produto != NULL) : ?>
            <script>
                alert("Produto inserido!");
            </script>
            <?php elseif(isset($produto) && $produto == NULL): ?>
                <script>
                alert("ERRO: Produto NÃO inserido!");
            </script>
            <?php endif;?>


           
            <form class="form-horizontal" id="form-produto" action="<?= site_url("Novo/salvar") ?>" method="POST" enctype="multipart/form-data">

              <div class='root-template'>
              
              <?php $idProduto = $item["idProduto"];?>

              <table class="table table-bordered">
                  <tr>

                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>

                  </tr>
                  <tr>

                    <td>
                      <input type="hidden" name="idProduto" value=" <?= $idProduto ?>">
                      <input type="text" name='nome' id="Logo" value="<?= $item["nomeProduto"]?>" placeholder="Nome do produto" required="required">
                    </td>
                    <td>

                      <input type="number" name='preco' id="Logo" value="<?= $item["precoProduto"]?>" placeholder="Preço em R$" required="required">
                      </select>
                    </td>
                    <td>
                      <select name="quant" class="input-medium" required="required">

                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="500">500</option>
                      </select>
                    </td>
                    <td>
                      <select name="idCate" required="required">
                        <option value=""> -- Escolha -- </option>
                        <?php foreach ($categorias as $key => $item) :
                          $selected = $item['idCategoriaProd'];

                        ?>
                          <option <?= $selected ?> value="<?= $selected ?>"><?= $item["nomeCategoriaProd"] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </td>

                  </tr>
                  <tr>

                    <th>Foto</th>
                    <th></th>
                    <th>Descrição</th>

                  </tr>
                  <tr>
                    <td colspan="2">
                      <input type="file" name="imagem" required="required">
                    </td>
                    <td>
                    <textarea rows="4" cols="50" name="desc"><?=$desc?></textarea>
                    </td>
                    
                  </tr>
                </table>
              </div>
              <div class='additional'></div>
              <hr />
              <div class="row-fluid">
                <div class="span12">
                  <button class="btn btn-primary " type="submit">Atualizar</button>
                  <a href="" onclick='confirmDelete("<?=site_url("Novo/DeleteProduto/$idProduto")?>")' class="btn">Excluir</a>
                </div>
              </div>
              <br />

            </form>
                           
          </div>
        </div>
      </div>
    </div>
    <?php endforeach;?> 


    <?php include 'footer.php';?>
