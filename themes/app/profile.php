<?php
    $this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url("themes/app/assets/css/profile.css"); ?>">
    <title>Document</title>
</head>

<body class="profile">

<div id="profile-container">
    <div id="header">Seu perfil</div>
    
    <div id="left-section">

    
    <div id="user-photo"></div>
  <div class="container-photo">
        <form class="formphoto">
            <p id="user"></p>
            
            <input type="file" name="foto" class="input-file">
            <input id="change-photo-btn" type="submit"><br>
            <div class="errormensage"></div>
            <div class="mensage"></div>
        </form>
        
        <form class="trocadenome">
        <h1>Atualize seus dados:</h1>
        <input name="newName" class="newName" required placeholder="Novo nome de Usuário">
        <button class="trocanome">Trocar nome de usuário</button>
      </form>
      <button class="logout">Sair da conta</button>
  </div>
  
    </div>
    
    <div id="right-section">
      <div class="shopping">Minhas compras:</div>
      <div class="compras">

        
      </div>
    </div>
  </div>
  
<script src="js/perfil.js" async></script>

</body>
</html>