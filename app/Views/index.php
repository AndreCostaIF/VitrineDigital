
<?php include 'masthead.php';?>

<div class="container">
  
    <div id="slider">
      <!--ESSE LINK N TA FUNCIONANDO-->
      <a href="<?=site_url("Home/index")?>">
        <img class="selected" src="<?=base_url('image/banner/default.png')?>" 
          alt="Anuncie conosco">
      </a>
      <img  src="<?=base_url('image/banner/macbook-new.jpg')?>" alt="mackbook">
      <img src="<?=base_url('image/banner/iphone.jpg')?>" alt="iphone">
      <img src="<?=base_url('image/banner/ipad.jpg')?>" alt="ipad">
      <img src="<?=base_url('image/banner/hyperx.jpg')?>" alt="hyperx">
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Nova Cruz Digital</h1>
        <p class="lead">Tudo o que você precisa em um só lugar!</p>
        <a class="botao" href="<?=site_url("Lojas/listar")?>">Ver todas as lojas</a>
      </div>
      <div class="Title-page">Categorias</div>
      <hr>
      
      <?php $controle = 999; ?>
      
      <div class="row-fluid" >
        <ul class="thumbnails">
        <?php foreach ($categoria as $key => $item) : ?>
          <?php if ($controle == 1 || $controle == 999) {
          $controle = 3;
        echo '<div class="row-fluid">
        <ul class="thumbnails" >';
      } ?>
          <li class="span2">
            <div class="thumbnail">
            <!--Imagem da categoria-->
            <a href="<?=site_url("Lojas/index/{$item['IdcategoriaNegocio']}")?>">
                <img alt="300x200" src='<?=base_url($item["imagem"])?>'>
            </a>
            <!--Nome da categoria-->
            <div class="caption">
            <a href="<?=site_url("Lojas/index/{$item['IdcategoriaNegocio']}")?>">
              <?php print($item["NomeCategoriaNegocio"]);?>
            </a>  
               
              </div>
            </div>
            </li>
          <?php

      if ($controle == 8 || $controle == 999) {

        echo "</ul> </div>";
        $controle = 0;
      } ?>
     <?php $controle++?>
    <?php endforeach;?>
        </ul>
      </div>

      <?php include 'footer.php';?>
