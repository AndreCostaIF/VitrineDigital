<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" href="<?= base_url("favicon.ico") ?>" type="image" sizes="16x16">
  <title>Vitrine Digital Nova Cruz</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="Content-Security-Policy" content="">



  <script src="<?= base_url("js/jquery.js") ?>"></script>
  <script src="<?= base_url("js/card.js") ?>"></script>

  <!-- jQuery baseUrl -->
  <script>
    var baseUrl = '<?php echo base_url(); ?>';
    var siteUrl = '<?php echo site_url(); ?>';
  </script>

  <!-- Le styles -->
  <link href="<?= base_url("/css/bootstrap-combined.min.css") ?>" rel="stylesheet">

  <!--SCRIPT GOOGLE-->
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <meta name="google-signin-client_id" content="219544531218-f1dh6fivqrm76crmn6niupvfbap34icj.apps.googleusercontent.com">
  <script src='<?= base_url("js/AuthUser.js") ?>'></script>

  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="<?= base_url("js/bootstrap.min.js") ?>"></script>

  <!--CSS -->
  <?php if (isset($_SESSION["user"]["theme"])) : ?>
    <link rel="stylesheet" href='<?= base_url("css/".$_SESSION["user"]["theme"]) ?>'>
  <?php else : ?>
    <link rel="stylesheet" href='<?= base_url("css/style.css") ?>'>
  <?php endif; ?>
  
  <script>
    //<![CDATA[
    $(window).on('load', function() {
      $('#preloader .inner').fadeOut();
      $('#preloader').delay(250).fadeOut('slow');
      $('body').delay(250).css({
        'overflow': 'visible'
      });
    })
    //]]>
  </script>

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <![endif]-->
</head>

<body>


  <!-- início do preloader -->
  <div id="preloader">
    <div class="inner">
      <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
      <img src='<?= base_url("image/373.gif") ?>'>
    </div>
  </div>
  <!-- fim do preloader -->
  <div class="masthead">

    <nav>
      <a class="logo" href="<?= site_url("Home/index") ?>">Nova Cruz Digital</a>

      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list">
        <li><a href="<?= site_url("Home/index") ?>">Home <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
              <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
            </svg></a></li>

        <?php if (!isset($_SESSION['shopkeeper']['storeName'])) : ?>
          <li><a href="<?= site_url("Checkout/ProdutosCarrinho") ?>">Carrinho
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 
                      12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2
                      2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7
                      0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
              </svg>
              <span class="badge badge-important"></span></a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['shopkeeper']['storeName'])) : ?>
          <li><a href="<?= site_url("Novo/index") ?>">Adicionar Produto <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
              </svg></a></li>
        <?php endif; ?>


        <li class="dropdown">
          <a href="#">
            Categorias
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <?php foreach ($categoria as $key => $item) : ?>

              <li><a href="<?= site_url("Lojas/index/{$item['IdcategoriaNegocio']}") ?>"><?php print($item["NomeCategoriaNegocio"]); ?></a></li>
            <?php endforeach; ?>

          </ul>
        </li>
        <!--PERFIL DA LOJA-->
        <?php if (isset($_SESSION['shopkeeper']['storeName'])) : ?>
          <li class="dropdown">
            <a href="<?= site_url("Portal/index") ?>">Perfil</a>
            <ul class="dropdown-menu">

              <li>
                <a href="<?= site_url("Compras/pedidos") ?>">Pedidos recebidos</a>
              </li>

              <li>
                <a href="<?= site_url("Novo/categoria") ?>">Adicionar Categorias</a>
              </li>

              <li>
                <a href="<?= site_url("Novo/index") ?>">Adicionar Produtos</a>
              </li>

              <li>
                <a href="<?= site_url("Novo/listaProdutos") ?>">Seus Produtos</a>
              </li>

              <li>
                <a href="<?= site_url("Compras/index/{$_SESSION['shopkeeper']['id']}") ?>">Conta</a>

              </li>
              <li>
                <!--BOTAO SAIR-->
                <a href="<?= site_url("Portal/logout") ?>">Sair</a>

                </a>
              </li>


            </ul>
          </li>

          <li><a href="<?= site_url("Compras/pedidos") ?>">Pedidos recebidos<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
              </svg></a></li>


        <?php elseif (isset($_SESSION['user']['name'])) : ?>
          <li class="dropdown">

            <?php if (!isset($_SESSION['user']['name'])) : ?>
              <a href="#">
                Login
                <span class="caret"></span>
              </a>

            <?php else : ?>
              <!--Foto e nome do usuario-->
              <?php if (isset($_SESSION['user']['photo'])) : ?>
                <div id="user">
                  <a href="#">
                    <img src="<?php echo $_SESSION['user']['photo']; ?>" id="user-photo">
                  </a>
                </div>
              <?php endif; ?>
              <a href="#">
                Perfil

              </a>
            <?php endif; ?>

            <ul class="dropdown-menu">
              <?php if (!isset($_SESSION['user']['name'])) : ?>
                <!--BOTAO ENTRAR GOOGLE-->
                <li><a href="<?= site_url("Login/index") ?>">Entrar</a></li>
              <?php else : ?>
                <li>
                  <p><?php $name = $_SESSION['user']['name'];
                      echo "Bem vindo, " . strstr($name, ' ', true);
                      ?>
                  </p>

                </li>
                <hr>
                <li>
                  <a href="#">Favoritos</a>
                </li>
                <li>
                  <a href="<?= site_url("Compras/index") ?>">Compras</a>
                </li>
                <?php if (isset($_SESSION['user']['id'])) : ?>
                  <li>

                    <a href="<?= site_url("Compras/index/{$_SESSION['user']['id']}") ?>">
                      Conta
                    </a>
                  </li>
                <?php endif; ?>
                <li>
                  <!--BOTAO SAIR GOOGLE-->
                  <a href="<?= site_url("Validation/logout") ?>" onclick="signOut();">Sair</a>
                  <script>
                    function signOut() {
                      var auth2 = gapi.auth2.getAuthInstance();
                      auth2.signOut().then(function() {});
                    }
                  </script>
                  </a>
                </li>

              <?php endif; ?>
            </ul>
          </li>
        <?php else : ?>
          <li><a href="<?= site_url("Portal/index") ?>">Portal do parceiro <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
              </svg></a></li>

          <li class="dropdown">
            <a href="<?= site_url("Login/index") ?>">
              Login
            </a>
          <?php endif; ?>
          </li>

      </ul>
    </nav>

  </div>