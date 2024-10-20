<?php
    $this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produtos</title>
    <link rel="stylesheet" href="<?= url("assets/css/adm/edit_product.css"); ?>">
    <script type= "module" src="<?= url("assets/js/adm/table.js"); ?>" async></script>
</head>
<body>
<main>
    <div class="container">
        <div class="form-products">
            <form id="form-edit">
                <h2>Editar Produto</h2>
                <input type="text" name="id" placeholder="ID do produto">
                <input type="text" name="name" placeholder="Alterar nome">
                <input type="number" name="price" placeholder="Alterar Valor">
                <input type="number" name="amount" placeholder="Alterar quantidade">
                <input type="text" name="url_products" placeholder="Alterar URL da Imagem">
                <input type="text" name="description" placeholder="Alterar Descrição">
                <input type="text" name="categories_id" placeholder="Alterar Categoria">
                <input type="submit" value="Editar Produto">
                
                <div id="toast-container"></div>
            </form>
        </div>

        <div class="form-products">
    <div class="tabelaprodutos">
        <h1>TABELA DE PRODUTOS CADASTRADOS:</h1>

        <div class="container-search">
            <form class="formSearch">
                <h3>Pesquise o id aqui</h3>
                <input type="number" name="product_id" placeholder="Digite o ID do produto a encontrar">
                <input type="submit" value="Pesquisar">
            </form>
            <span class="message-product"></span>
        </div>

        <table class="tabela">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>URL produto</th>
                    <th>Descrição do produto</th>
                    <th>Categoria do produto</th>
                </tr>
            </thead>
            <tbody id="tabela-corpo"></tbody>
        </table>

        <div class="toast-container"></div>
    </div>
</div>

        </div>
    </div>
</main>

</body>
</html>