<?php
$this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= url("assets/css/adm/home.css"); ?>">
    <script type="module" src="<?= url("assets/js/adm/registerProduct.js"); ?>" async></script>

</head>

<body>

    <main>



        <div class="container">
            <div class="form-products">

                <form id="form-insert">
                    <h2>Cadastro de Produtos</h2>
                    <input type="text" name="name" class="nomeprod" placeholder="Nome do Óculos" required>
                    <input type="number" name="price" class="precoprod" placeholder="Valor R$" required>
                    <input type="number" name="amount" class="quantprod" placeholder="Quantidade" required>
                    <input type="text" name="url_products" class="imagemprod" placeholder="URL da Imagem" required>
                    <input type="text" name="description" class="quantprod" placeholder="Descrição" required>
                    <select name="categories_id" required>
                        <option disabled selected>Selecione a categoria</option>
                        <option value="1">Óculos de sol</option>
                        <option value="2">Óculos de grau</option>
                        <option value="3">Acessórios</option>
                    </select>


                    <input type="submit" class="produtobutton" value="Cadastrar Produto">
                    
                </form>
                
            </div>

            <div class="form-products">

                <form id="form-insert-cate">
                    <h2>Cadastro de Categoria</h2>
                    <input type="text" name="name" class="nomecateg" placeholder="Nome da nova categoria" required>
                    <input type="submit" class="categoriabutton" value="Cadastrar Categoria">
                    
                </form>
            </div>
            <div id="toast-container"></div>
            <div class="form-products">

            <form id="form-insert-order">
                    <h2>Cadastro de Pedidos</h2>
                    <input type="number" name="total" placeholder="Valor total do pedido" required>
                    <input type="number" name="quantity" placeholder="Quantidade de itens" required>
                    <input type="text" name="description" placeholder="Descrição para fácil busca" required>
                    <input type="number" name="users_id" placeholder="ID do usuário que solicitou" required>

                    <input type="submit" value="Cadastrar Pedido">
                    
                </form>
            </div>

            
        </div>


    </main>
</body>

</html>