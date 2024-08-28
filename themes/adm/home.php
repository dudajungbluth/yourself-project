<?php
$this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= url("themes/adm/assets/css/home.css"); ?>">
    <script src="<?= url("themes/adm/assets/js/registerProduct.js"); ?>" async></script>
</head>
<body>

<main>

        <div class="container">
            <div class="form-products">

                <form id="form-insert">
                    <h2>Cadastro de Produtos</h2>
                    <input type="text" name="name" class="nomeprod" placeholder="Nome do Óculos" required>
                    <input type="number" name="price" class="precoprod" placeholder="Valor R$" required>
                    <input type="number" name="amount" class= "quantprod" placeholder="Quantidade" required>
                    <input type="text" name="url_products" class="imagemprod" placeholder="URL da Imagem" required>
                    <input type="text" name="description" class= "quantprod" placeholder="Descrição" required>
                    <select name="categories_id" required>
                        <option disabled selected>Selecione a categoria</option>
                        <option value="1">Óculos de sol</option>
                        <option value="2">Óculos de grau</option>
                        <option value="3">Acessórios</option>
                    </select>

                    
                    <input type="submit" class="produtobutton" value="Cadastrar Produto">
                </form>
            </div>
        </div>


    </main>
</body>
</html>
