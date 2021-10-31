<?php include 'masthead.php'; ?>
<div class="container">


<?php
$cont = 0;
$controle = 999;
?>
<div class='row-fluid'>
  <ul class='thumbnails'>
    <?php if ($resultado == NULL) : ?>
      <div class="alert alert-info">Nenhum produto desse segmento foi encontrado! :(</div>
    <?php else : ?>
      <?php foreach ($resultado as $key => $item) : ?>

        <?php if ($controle == 1 || $controle == 999) {
          $controle = 3;
          echo "<div class='row-fluid'><ul class='thumbnails'>";
        } ?>
        <li class="span3">

          <div class="thumbnail">
            <img alt="230x200" src='<?= base_url($item["imagenProduto"]) ?>' width="230" height="200">
            <div class="caption">
              <!-- SAMERDA NAO FUNCIONA -->

              <form action="<?= site_url("Checkout/AdicionarAoCarrinho")?>" method="POST">
                

                <h3><?php print($item["nomeProduto"]); ?></h3>
                <h4>Preço: R$<?php print($item["precoProduto"]); ?> </h4>
                <h5>Disponiveis: <?php print($item["quantidade"]); ?></h5>
                
                <?php if (isset($_SESSION['user']['id'])) : ?>

                  <input type="hidden" id = "validation" name="IdCarrinho" value="<?php print($_SESSION['user']["idCart"]); ?>">
                  <input type="hidden" name="IdProduto" value="<?php print($item["idProduto"]); ?>">
                  <input type="hidden" name="Quantidade" value="1">
                  <input type="hidden" name="preco" value="<?php print($item["precoProduto"]); ?>">
                  
                  

                <?php endif; ?>

                <?php $idCate = $item["idCategoriaProd"] ?>

                <input type="hidden" name="IdCate" value="<?php print($idCate); ?>">
                <input type="hidden" name="IdLoja" value="<?php print($idLoja); ?>">

                <p>Descrição: <?php print($item["descricaoProduto"]); ?></p>
                <?php if(isset($_SESSION["shopkeeper"]["name"]) && $_SESSION["shopkeeper"]["id"] == $idLoja ) :?>
                  <p><a href="<?= site_url("Novo/listaProdutos/") ?>" class="btn btn-primary">Editar produto</a></p>
                <?php else: ?>
                  
                  <?php if(isset($_SESSION['user']['id'])) : ?>
                  <div class="controls">
                  
                  <button type="submit" onclick='addCart("<?= site_url("Checkout/listarProdutos/$idCate/$idLoja") ?>")' class="btn btn-primary">Adicionar ao carrinho</button>
                </div>
                <?php else: ?>
                  <div class="controls">
                  
                  <p><a href="<?= site_url("Login/index/") ?>" class="btn btn-primary">Adicionar ao Carrinho</a></p>
                </div>
               <?php endif;?>

                <?php endif;?>
              </form>

            </div>
          </div>

        </li>
        <?php

        if ($controle == 6 || $controle == 999) {

          echo "</ul> </div>";
          $controle = 0;
        } ?>
        <?php $controle++; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </ul>
</div>

<?php include 'footer.php';?>