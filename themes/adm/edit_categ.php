<?php
    $this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
    <link rel="stylesheet" href="<?= url("assets/css/adm/edit_product.css"); ?>">
    <script type= "module" src="<?= url("assets/js/adm/list_categ.js"); ?>" async></script>
</head>
<body>
<main>

<div class="container">
    <div class="form-editCateg">

        <form id="form-edit">
            <h2>Editar Categoria</h2>
            <input type="number" name="id" placeholder="ID da categoria" >
            <input type="text" name="name" placeholder="Alterar nome" >
           
            <input type="submit" value="Editar Categoria">
            
        </form>

        <div id="toast-container"></div>
        
        <div class="container">
        <div class="form-products">
            <div class="tabelaprodutos">

            <div class="container-search">
            <form class="formSearch">
                <h3>Pesquise o id aqui</h3>
                <input type="number" name="id_categ" placeholder="Digite o ID da categoria a encontrar">
                <input type="submit" value="Pesquisar">
            </form>
            <span class="message-product"></span>
        </div>
        
                <h1>TABELA DE CATEGORIAS CADASTRADAS:</h1>
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody id="tabela-corpo">
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
</div>


</main>
</body>
</html>