<?php include 'masthead.php'; ?>
<div class="container">

    <div class="login-container">

        <div class="Title-page">
            <p>Portal do Parceiro</p>
        </div>

        <?php if (isset($_SESSION['shopkeeper']['name'])) : ?>

            <div class="alert alert-info">Sair da sua conta
                <!---Verifica se existe Lojista conectado-->

                <a href="<?= site_url("Portal/logout") ?>" class="btn">sair</a>
            </div>

        <?php else : ?>



            <div style='color:red;'><?php if (isset($_SESSION['erro'])) : ?>
                    <?= $_SESSION['erro'] ?>
                <?php endif; ?>
            </div>

            <form action="<?= site_url("Portal/logar") ?>" method="post">
                <label class="control-label" for="name">Usuário</label>
                <div class="control-input">
                    <input type="text" name="UserLojista" id="UserLojista" placeholder="Usuário" required="required">
                </div>

                <label class="control-label" for="password">Senha</label>
                <div class="control-input">
                    <input type="password" name="SenhaLojista" id="SenhaLojista" placeholder="Senha" required="required">
                </div>

                <button type="submit" class="botao">Entrar</button>
                <div class="forgot"><a href="#">Esqueceu a senha?</a></div>

            </form>

            <div class="create-account">
                <p>Ainda não é parceiro?</p>
                <a href="<?= site_url("Partner/index") ?>">Ser Parceiro</a>
            </div>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>