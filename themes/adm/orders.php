<?php
    $this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Encomendas</title>
    <link rel="stylesheet" href="<?= url("assets/css/adm/edit_product.css"); ?>">
    <script type= "module" src="<?= url("assets/js/adm/list_order.js"); ?>" async></script>
</head>
<body>
<main>
    <div class="container">
        <div class="form-products">
            <form id="form-edit">
                <h2>Editar Encomendas</h2>
                <input type="text" name="id" placeholder="ID do produto">
                <input type="number" name="total" placeholder="Alterar total">
                <input type="number" name="quantity" placeholder="Alterar quantidade de produtos pedidos">
                <input type="text" name="description" placeholder="Alterar descrição">
                <input type="text" name="users_id" placeholder="Alterar ID do usuario cliente">
                <input type="submit" value="Editar ENCOMENDA">
            </form>
        </div>

        <div id="toast-container"></div>
        <div class="form-products">
    <div class="tabelaprodutos">
        <h1>TABELA DE ENCOMENDAS:</h1>

        <div class="container-search">
            <form class="formSearch">
                <h3>Pesquise o id aqui</h3>
                <input type="number" name="order_id" placeholder="Digite o ID do produto a encontrar">
                <input type="submit" value="Pesquisar">
            </form>
            <span class="message-product"></span>
        </div>

        <table class="tabela">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Total</th>
                    <th>Quantidade de produto</th>
                    <th>Descrição da compra</th>
                    <th>ID do usuario </th>
                
                </tr>
            </thead>
            <tbody id="tabela-corpo"></tbody>
        </table>

       
    </div>
</div>

        </div>
    </div>
</main>

</body>
</html>