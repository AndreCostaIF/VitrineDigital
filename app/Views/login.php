<?php include 'masthead.php'; ?>
<div class="container">
    <div class="login-container">

        <div class="Title-page">
            <p>Login</p>
        </div>

        <form action="#">
            <label class="control-label" for="name">Usuário</label>
            <div class="control-input">
                <input type="text" name="User" id="User" placeholder="Usuário" required="required">
            </div>

            <label class="control-label" for="name">Senha</label>
            <div class="control-input">
                <input type="password" name="senha" id="senha" placeholder="Senha" required="required">
            </div>

            <button type="submit" class="botao">Login</button>
            <div class="forgot"><a href="#">Esqueceu a senha?</a></div>

        </form>

        <div class="create-account">
            <p>Não tem uma conta?</p>
            <a href="#">Criar conta</a>
            <p>ou</p>
        </div>

        <div class="login-google">
            <p>Entre com</p>
            <div class="g-signin2" data-onsuccess="onSignIn"></div>
        </div>
    </div>

    <?php include 'footer.php'; ?>