<?php


//Perguntar a duda pra q danado ta usando isso
use App\Controllers\AddressUser;

include 'masthead.php';
include 'personal.php'; ?>

<div class="container">

    <div class="row-fluid">
        <div class="block">

            <?php if (isset($_SESSION['user']['id'])) : ?>
                <INPUT TYPE="hidden" NAME="IdUsuario" VALUE="<?= $_SESSION['user']['id'] ?>">
            <?php endif; ?>
            <div>
                <!--CONTATO-->
                <fieldset>
                    <legend class="Title-page">Cartão de Crédito</legend>
                    
                    <div class="box-line">
                        <div class="content">
                            <div class="creditCardForm">
                                <div class="heading">
                                    <h1>Cadastrar Cartão</h1>
                                </div>
                                <div class="payment">
                                    <form>
                                        <div class="form-group owner">
                                            <label for="owner">Titular</label>
                                            <input type="text" class="form-control" id="owner">
                                        </div>
                                        <div class="form-group CVV">
                                            <label for="cvv">CVV</label>
                                            <input type="text" class="form-control" id="cvv">
                                        </div>
                                        <div class="form-group" id="card-number-field">
                                            <label for="cardNumber">Número do Cartão</label>
                                            <input type="text" class="form-control" id="cardNumber">
                                        </div>
                                        <div class="form-group" id="expiration-date">
                                            <label>Validade</label>
                                            <select>
                                                <option value="01">Janeiro</option>
                                                <option value="02">Fevereiro </option>
                                                <option value="03">Março</option>
                                                <option value="04">Abril</option>
                                                <option value="05">Maio</option>
                                                <option value="06">Junho</option>
                                                <option value="07">Julho</option>
                                                <option value="08">Agosto</option>
                                                <option value="09">Setembro</option>
                                                <option value="10">Outubro</option>
                                                <option value="11">Novembro</option>
                                                <option value="12">Dezembro</option>
                                            </select>
                                            <select>
                                                <option value="16"> 2016</option>
                                                <option value="17"> 2017</option>
                                                <option value="18"> 2018</option>
                                                <option value="19"> 2019</option>
                                                <option value="20"> 2020</option>
                                                <option value="21"> 2021</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="credit_cards">
                                            <img src="<?= base_url("image/assets/visa.jpg") ?>" id="visa">
                                            <img src="<?= base_url("image/assets/mastercard.jpg") ?>" id="mastercard">
                                            <img src="<?= base_url("image/assets/amex.jpg") ?>" id="amex">
                                        </div>
                                        <div class="form-group" id="pay-now">
                                            <div class="form-bnt">
                                                <button type="submit" class="botao">Salvar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </fieldset>




            </div>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?= base_url("js/assets/jquery.payform.min.js") ?>" charset="utf-8"></script>
    <script src="<?= base_url("js/assets/script.js") ?>"></script>

    <?php include 'footer.php'; ?>