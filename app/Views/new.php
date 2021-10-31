<?php include 'masthead.php'; ?>
<div class="container">
    <div class="row-fluid">
      <div class="block">
        <div class="navbar navbar-inner block-header">
          <div class="muted pull-left">Adicionar produtos</div>
          <div class="pull-right"><a href="<?= site_url("Novo/listaProdutos") ?>" id="produto">Seus Produtos</a></div>
        </div>
        <div class="block-content collapse in">
          <div class="span12">
            <div class="alert alert-info">Cadastrar Categorias <a href="<?= site_url("Novo/categoria") ?>" class="btn">Adicionar Categoria</a> </div>

            <?php if (isset($produto) && $produto != NULL) : ?>
              <script>
                alert("Produto inserido!");
              </script>
            <?php elseif (isset($produto) && $produto == NULL) : ?>
              <script>
                alert("ERRO: Produto NÃO inserido!");
              </script>
            <?php endif; ?>
            <form class="form-horizontal" id="form-produto" action="<?= site_url("Novo/salvar") ?>" method="POST" enctype="multipart/form-data">

              <div class='root-template'>
                <table class="table table-bordered">
                  <tr>

                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>

                  </tr>
                  <tr>

                    <td>
                      <input type="hidden" name="idLoja" value="<?php $_SESSION['shopkeeper']['id'] ?>">
                      <input type="text" name='nome' id="Logo" value="" placeholder="Nome do produto" required="required">
                    </td>
                    <td>

                      <input type="number" name='preco' id="Logo" value="" placeholder="Preço em R$" required="required">
                      </select>
                    </td>
                    <td>
                      <select name="quant" class="input-medium">

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
                      <select name="idCate">
                        <option value=""> -- Escolha -- </option>
                        <?php if(isset($categorias)) : foreach ($categorias as $key => $item) :
                          $selected = $item['idCategoriaProd'];

                        ?>
                          <option <?= $selected ?> value="<?= $selected ?>"><?= $item["nomeCategoriaProd"] ?></option>
                        <?php endforeach; endif;?>
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
                      <input type="file" name="imagem" class="image">
                    </td>
                    <td>
                      <textarea rows="4" cols="50" name="desc" form="form-produto"></textarea>
                    </td>
                  </tr>
                </table>
              </div>
              <div class='additional'></div>
              <hr />
              <div class="row-fluid">
                <div class="span12">
                  <button class="btn btn-primary " type="submit">Adicionar</button>
                </div>
              </div>
              <br />





            </form>

          </div>
        </div>
      </div>
    </div>



    <?php include 'footer.php'; ?>