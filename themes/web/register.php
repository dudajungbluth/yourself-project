<?php
    $this->layout("_theme");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="assets/css/web/register.css">
    <script src="assets/js/web/register.js" async></script>
</head>
<body>

    <main>
        <div class="container">
            <div class="form-login">

                <form id="formRegister">
                    <span class = "login-title">Crie o seu cadastro.</span>
                    <input type="name" name="name" id="" placeholder="Nome" />
                    <input type="email" name="email" id="" placeholder="E-mail" />
                    <input type="password" name="password" placeholder="Senha">
                    <input type="password" name="confirm" placeholder="Digite sua senha novamente">
                    <input type="submit" value="Cadastrar" />
                        <div class="span-register">
                        <a href="<?= url("entrar");?>"><span>Já é cliente? Clique aqui. <i class="fa-solid fa-up-right-from-square" style="color: #1a1a1a;"></i></span></a>
                     </div>
                </form>
                
            </div>
            
        </div>
        </div>
    </main>
  
    
</body>
</html>