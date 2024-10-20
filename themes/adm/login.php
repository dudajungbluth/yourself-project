<?php
$this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url("assets/css/adm/home.css"); ?>">
    <script type="module" src="<?= url("assets/js/adm/login.js"); ?>" async></script>
    <title>Document</title>
</head>
<body>
    <main>
    <div class="formadm">
        <h2>Login obrigatório - Adm</h2>
        <form id="loginForm">

            <p>Email:</p>
            <input type="text" id="email" name="email" required>

            <p>Senha:</p>
            <input type="password" name="password" placeholder="Senha">

            <div class="errorrr"></div>
            <input type="submit" value="Entrar" />
        </form>
    </div>
    </main>
</body>
</html>