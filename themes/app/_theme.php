<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yourself</title>
    <link rel="stylesheet" href="<?= url("assets/css/app/_theme.css"); ?>">
    <script src="https://kit.fontawesome.com/e9ad9d0028.js" crossorigin="anonymous"></script>
    <script src="assets/js/app/_theme.js" async></script>
    
</head>
<body>

<header>
       <div class="logo">
        <a href="<?= url();?>"><img src="<?= url("themes/app/assets/imagens/logo.png"); ?>"></a> 
       </div>


       <ul class="main-menu">
        <li><a href="<?= url("oculos-sol");?>">Óculos de sol</a></li>
        <li><a href="<?= url("acessorios");?>">Acessórios</a></li>
        <li><a href="<?= url("oculos-grau");?>">Óculos de grau</a></li>
        <li><a href="<?= url("sobre");?>">Sobre nós</a></li>
    </ul>



        <div class="icons">
            
            <!-- <a href=""></a>
            <button class="search-icon"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></button> -->

 
            <button class="accont-icon" onclick="window.location.href = '<?= url("entrar");?>'"><i class="fa-solid fa-user" style="color: #000000;"></i></button>


            
            <button class="cart-icon"><i class="fa-solid fa-bag-shopping" style="color: #000000;"></i></button>
  
        </div>


    </header>

<main>

    <?php
        echo $this->section("content");
    ?>

</main>

<footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                
            <img style="max-width: 120px; max-height: 120px ; margin-right:50px"src="<?= url("themes/app/assets/imagens/logofooter.png"); ?>">

                <li class="information">CONTATOS:</li>

                <div class="footer-social">
                    <ul>
                    

                        <li>SIGA-NOS</li>
                        <li><a href="https://www.instagram.com/yourselfoficialch/" target="_blank"><i class="fab fa-instagram"></i></a></li>

                        <li>NOSSO WHATSAPP</li>
                        <li><a href="" target="_blank"><i class="fa-brands fa-whatsapp" style="color: #ffffff;"></i></a></li>
                    </ul>
                </div>
            </div>
            
        </div>
      </footer>


</body>
</html>