<?php include 'masthead.php'; ?>


<div class="container">
<?php
$cont = 0;
$controle = 999;
?>
<div class='row-fluid'>
  <ul class='thumbnails'>
    <div class="Title-page">
      <h2>Segmentos</h2>
      <hr>
    </div>
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
            <img alt="230x200" src='<?= base_url($item["imagem"]) ?>' width="230" height="200">
            <div class="caption">
              <h3><?php print($item["nomeCategoriaProd"]); ?></h3>
              <?php $idCate = $item["idCategoriaProd"] ?>
              <p><a href="<?= site_url("Checkout/listarProdutos/$idCate/$idLoja") ?>" class="btn btn-primary">Ver Produtos</a></p>
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

<?php include 'footer.php'; ?>