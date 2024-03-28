<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e9ad9d0028.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Login</title>
</head>
<body>
<header>
       <div class="logo">
        <img src="../imagens/logo.png">
       </div>


       <ul class="main-menu">
        <li><a href="pages/sunglasses.php">Óculos de sol</a></li>
        <li><a href="pages/accessories.php">Acessórios</a></li>
        <li><a href="pages/degreepage.php">Óculos de grau</a></li>
        <li><a href="pages/about.php">Sobre</a></li>
    </ul>



        <div class="icons">
            
            <!-- <a href=""></a>
            <button class="search-icon"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></button> -->

            <a href="pages/login.php">
            <button class="accont-icon" onclick="abrirCarrinho()"><i class="fa-solid fa-user" style="color: #000000;"></i></button>
            </a>
            <button class="cart-icon" onclick="abrirCarrinho()"><i class="fa-solid fa-bag-shopping" style="color: #000000;"></i></button>
  
        </div>


    </header>

    <div class="page">
        <form method="POST" class="formLogin">
            <h1>Login</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label for="email">E-mail</label>
            <input type="email" placeholder="Digite seu e-mail" autofocus="true" />
            <label for="password">Senha</label>
            <input type="password" placeholder="Digite seu e-mail" />
            <a href="/">Esqueci minha senha</a>
            <input type="submit" value="Acessar" class="btn" />
        </form>
    </div>
    
</body>
</html>