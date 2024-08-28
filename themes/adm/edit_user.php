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
</head>
<body>
<main>

<div class="container">
    <div class="form-products">

        <form id="form-insert">
            <h2>Editar Usuário</h2>
            <input type="text" name="name" placeholder="Nome do Óculos" required>
            <input type="number" name="value" placeholder="Valor R$" required>
            <input type="number" name="quantity" placeholder="Quantidade" required>
            <input type="text" name="url" placeholder="URL da Imagem" required>

            <input type="submit" value="Editar Produto">
        </form>
    </div>
</div>


</main>
</body>
</html>