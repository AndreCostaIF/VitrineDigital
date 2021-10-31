<?php


//Perguntar a duda pra q danado ta usando isso
use App\Controllers\AddressUser;

include 'masthead.php';
include 'personal.php'; ?>

<div class="container">

  <div class="row-fluid">
    <div class="block">
      <form action="<?=site_url("AddressUser/salvar")?>" method="POST">
        <?php if (isset($_SESSION['user']['id'])) : ?>
          <input type="hidden" name="IdUsuario" value="<?= $_SESSION['user']['id'] ?>">
          <input type="hidden" name="photoUser" value="<?= $_SESSION['user']['photo'] ?>">
        <?php endif; ?>
        <div>
          <!--CONTATO-->
          <fieldset>
            <legend class="Title-page">Contato</legend>

            <div class="box-line">
              <div class="content">

                <label class="basic-text">
                  Primeiro Nome
                </label>
                <?php $str = $_SESSION['user']['name'];
                $name = strstr($str, ' ', true);
                ?>
                <input type="text" name="name" value="<?= $name ?>"></input>

                <label class="basic-text">
                  Telefone
                </label>
                <input type="text" name="phone"  value="<?= _v($user, "Telefone") ?>"></input>

              </div>
            </div>

            <div class="box-line">
              <div class="content">
                <label class="basic-text">
                  Ultimo Nome
                </label>
                <?php $str = $_SESSION['user']['name'];
                $lastName = strstr($str, ' ');
                ?>
                <input type="text" name="LastName" value="<?=$lastName ?>"></input>

                <label class="basic-text">
                  E-mail
                </label>
                <input type="text" name="email" value="<?= $_SESSION['user']['email'] ?>"></input>
              </div>
            </div>
          </fieldset>

          <!--ENDEREÇO-->
          <fieldset>
            <legend class="Title-page">Endereço</legend>

            <div class="box-line">
              <div class="content">

                <label class="basic-text">
                  Rua
                </label>
                <input type="text" name="Rua" value="<?= _v($user, "Rua") ?>"></input>

                <label class="basic-text">
                  Bairro
                </label>
                <input type="text" name="Bairro" value="<?= _v($user, "Bairro") ?>"></input>

              </div>
            </div>

            <div class="box-line">
              <div class="content">
                <label class="basic-text">
                  Numero
                </label>
                <input type="text" name="Numero" value="<?= _v($user, "Numero") ?>"></input>

                <label class="basic-text">
                  Cidade
                </label>
                <input type="text" name="Cidade" value="<?= _v($user, "Cidade") ?>"></input>


              </div>
            </div>

            <div class="box-line">
              <div class="content">
                <label class="basic-text">
                  UF
                </label>
                <input type="text" name="UF" value="<?= _v($user, "UF") ?>"></input>

              </div>
            </div>
          </fieldset>
          <div class="form-bnt">
            <button type="submit" class="botao">Enviar</button>
          </div>

        </div>
      </form>
    </div>
  </div>


  <?php include 'footer.php'; ?>