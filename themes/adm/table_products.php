<?php
    $this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produtos</title>
    <link rel="stylesheet" href="<?= url("themes/adm/assets/css/edit_product.css"); ?>">
    <script src="<?= url("themes/adm/assets/js/table.js"); ?>" async></script>
</head>
<body>
<main>

<div class="container">
    <div class="form-products">

    <div class="tabelaprodutos">
  
  <h1 >TABELA DE PRODUTOS CADASTRADOS:</h1>
  <button class="carregas"><i class="fa-solid fa-arrow-down" style="color: #000000;"></i></button>
  <table class="tabela">
    
  </table>

    </div>
</div>


</main>
</body>
</html>