<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= url("assets/css/adm/_theme.css"); ?>">
    <script src="https://kit.fontawesome.com/e9ad9d0028.js" crossorigin="anonymous"></script>
</head>

<body>

    <header>
        <div class="adm-info">
            <h1>Página Administrativa</h1>
        </div>
        <div class="logo">
            <a href="<?= url(); ?>"><img src="<?= url("assets/images/adm/logo.png"); ?>"></a>
        </div>

        <ul class="main-menu">
           
        </ul>
        <div class="icons">
            
            <!-- <a href=""></a>
            <button class="search-icon"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></button> -->

 
            <button class="accont-icon" onclick="window.location.href = '<?= url("entrar");?>'"><i class="fa-solid fa-house" style="color: #000000;"></i></button>
  
        </div>

    </header>
    <hr>
    <div class="sub-header"> 
            <li onclick="window.location.href = '<?= url("/admin/"); ?>'">Adicionar Produto/Categoria</li>
            <li onclick="window.location.href = '<?= url("/admin/editar-produtos"); ?>'">Editar Produto</li>
            <li onclick="window.location.href = '<?= url("/admin/editar-usuario"); ?>'">Editar usuário</li>
            <li onclick="window.location.href = '<?= url("/admin/encomendas"); ?>'">Encomendas</li>
            <li onclick="window.location.href = '<?= url("/admin/editar-categoria"); ?>'">Editar categoria</li>

    </div>

    <main>
       
    <?php
        echo $this->section("content");
        ?>
    </main>

    <!--
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
-->

</body>

</html>
