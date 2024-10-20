<?php
    $this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e9ad9d0028.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/web/login.css">
    <script src="assets/js/web/login.js" async></script>

</head>
<body>

    <main>
        <div class="container">
            <div class="form-login">

                <form id="formLogin">
                    <span class = "login-title">Já é cliente? Faça o login.</span>
                    <input type="email" name="email" id="" placeholder="E-mail" />
                    <input type="password" name="password" placeholder="Senha">
                    <input type="submit" value="Entrar" />
                        <div class="span-register">
                    <a href="<?= url("cadastro");?>"><span>Novo aqui? Cadastre-se.<i class="fa-solid fa-up-right-from-square" style="color: #1a1a1a;"></i></span></a>
                     </div>
                </form>
                
            </div>
            
        </div>
        </div>
    </main>
  
    
</body>
</html>