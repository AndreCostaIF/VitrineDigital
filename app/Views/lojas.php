<?php include 'masthead.php'; ?>
<div class="container">
<?php $controle = 999; ?>
<div class="row-fluid">
  <ul class="thumbnails">
    <?php if ($lojas == null) : ?>

      <div class="Title-page">
        <h2>Lojas</h2>
        <hr>
      </div>
      <div class="alert alert-info">Nenhuma loja desse segmento foi encontrada! <br>Quer se tonar um parceiro e ter sua loja aqui?<br>
        <a href="<?= site_url("Partner/index") ?>" class="btn">Seja Parceiro</a>
      </div>

    <?php else : ?>
      <div class="Title-page">
        <h2>Lojas</h2>
        <hr>
      </div>
      <?php foreach ($lojas as $key => $item) : ?>

        <?php if ($controle == 1 || $controle == 999) {
          $controle = 3;
          echo "<div class='row-fluid'><ul class='thumbnails'>";
        } ?>
        <!-- Example row of columns -->

        <li class="span3">
          <div class="thumbnail">
            <img alt="230x200" src='<?= base_url($item["Logo"]) ?>' width="230" height="200">
            <div class="caption">
              <h3><?php print($item["NomeFantasia"]); ?></h3>
              <?php $id = $item["IdLoja"]; ?>
              <p><a href="<?= site_url("Lista/index/$id") ?>" class="btn btn-primary">Visitar Loja</a></p>
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