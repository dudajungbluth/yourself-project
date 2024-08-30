
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yourself Project</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1, h2, h3, h4 {
            color: #333;
        }
        code {
            background-color: #f4f4f4;
            padding: 2px 5px;
            border-radius: 4px;
        }
        pre {
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }
        ul {
            margin-left: 20px;
        }
    </style>
</head>
<body>

<h1>Documentação Yourself Project</h1>

<p>Esta documentação descreve as rotas, parâmetros aceitos, exemplos de requisições e respostas, além dos códigos de status HTTP retornados pelo Web Service. </p>

<h2>Autenticação</h2>
<p>Algumas rotas deste Web Service requerem autenticação via token JWT. A autenticação deve ser realizada através de um cabeçalho <code>Authorization</code> contendo o token JWT.</p>

<h2>Rotas</h2>

<h3>1. Inserir Produto</h3>
<p><strong>Rota:</strong> <code>POST /api/products</code></p>
<p><strong>Parâmetros:</strong></p>
<ul>
    <li><code>name</code>: Nome do produto (string)</li>
    <li><code>price</code>: Preço do produto (float)</li>
    <li><code>amount</code>: Quantidade do produto (int)</li>
    <li><code>description</code>: Descrição do produto (string)</li>
    <li><code>url_products</code>: URL da imagem do produto (string)</li>
    <li><code>categories_id</code>: ID da categoria do produto (int)</li>
</ul>
<p><strong>Exemplo de Requisição:</strong></p>
<pre><code>{
    "name": "Produto Exemplo",
    "price": 29.99,
    "amount": 10,
    "description": "Descrição do produto exemplo",
    "url_products": "http://exemplo.com/imagem.jpg",
    "categories_id": 1
}</code></pre>
<p><strong>Exemplo de Resposta:</strong></p>
<pre><code>{
    "type": "success",
    "message": "Produto cadastrado com sucesso!"
}</code></pre>

<h3>2. Listar Produtos</h3>
<p><strong>Rota:</strong> <code>GET /api/products</code></p>
<p><strong>Parâmetros:</strong> Nenhum</p>
<p><strong>Exemplo de Resposta:</strong></p>
<pre><code>[
    {
        "id": 1,
        "name": "Produto Exemplo",
        "price": 29.99,
        "amount": 10,
        "description": "Descrição do produto exemplo",
        "url_products": "http://exemplo.com/imagem.jpg",
        "categories_id": 1
    }
]</code></pre>

<h3>3. Listar Produto por ID</h3>
<p><strong>Rota:</strong> <code>GET /api/products/{id}</code></p>
<p><strong>Parâmetros:</strong></p>
<ul>
    <li><code>id</code>: ID do produto (int)</li>
</ul>
<p><strong>Exemplo de Resposta:</strong></p>
<pre><code>{
    "id": 1,
    "name": "Produto Exemplo",
    "price": 29.99,
    "amount": 10,
    "description": "Descrição do produto exemplo",
    "url_products": "http://exemplo.com/imagem.jpg",
    "categories_id": 1
}</code></pre>

<h3>4. Atualizar Produto</h3>
<p><strong>Rota:</strong> <code>PUT /api/products/{id}</code></p>
<p><strong>Parâmetros:</strong></p>
<ul>
    <li><code>id</code>: ID do produto (int)</li>
    <li><code>name</code>: Nome do produto (string)</li>
    <li><code>price</code>: Preço do produto (float)</li>
    <li><code>amount</code>: Quantidade do produto (int)</li>
    <li><code>description</code>: Descrição do produto (string)</li>
    <li><code>url_products</code>: URL da imagem do produto (string)</li>
    <li><code>categories_id</code>: ID da categoria do produto (int)</li>
</ul>
<p><strong>Exemplo de Requisição:</strong></p>
<pre><code>{
    "id": 1,
    "name": "Produto Atualizado",
    "price": 39.99,
    "amount": 5,
    "description": "Descrição atualizada do produto",
    "url_products": "http://exemplo.com/imagem_nova.jpg",
    "categories_id": 2
}</code></pre>
<p><strong>Exemplo de Resposta:</strong></p>
<pre><code>{
    "type": "success",
    "message": "Produto atualizado com sucesso!"
}</code></pre>

<h3>5. Excluir Produto</h3>
<p><strong>Rota:</strong> <code>DELETE /api/products/{id}</code></p>
<p><strong>Parâmetros:</strong></p>
<ul>
    <li><code>id</code>: ID do produto (int)</li>
</ul>
<p><strong>Exemplo de Resposta:</strong></p>
<pre><code>{
    "type": "success",
    "message": "Produto excluído com sucesso!"
}</code></pre>

<h3>6. Inserir Categoria</h3>
<p><strong>Rota:</strong> <code>POST /api/categories</code></p>
<p><strong>Parâmetros:</strong></p>
<ul>
    <li><code>name</code>: Nome da categoria (string)</li>
</ul>
<p><strong>Exemplo de Requisição:</strong></p>
<pre><code>{
    "name": "Categoria Exemplo"
}</code></pre>
<p><strong>Exemplo de Resposta:</strong></p>
<pre><code>{
    "type": "success",
    "message": "Categoria cadastrada com sucesso!"
}</code></pre>

<h3>7. Listar Categorias</h3>
<p><strong>Rota:</strong> <code>GET /api/categories</code></p>
<p><strong>Parâmetros:</strong> Nenhum</p>
<p><strong>Exemplo de Resposta:</strong></p>
<pre><code>[
    {
        "id": 1,
        "name": "Categoria Exemplo"
    }
]</code></pre>

<h3>8. Listar Categoria por ID</h3>
<p><strong>Rota:</strong> <code>GET /api/categories/{id}</code></p>
<p><strong>Parâmetros:</strong></p>
<ul>
    <li><code>id</code>: ID da categoria (int)</li>
</ul>
<p><strong>Exemplo de Resposta:</strong></p>
<pre><code>{
    "id": 1,
    "name": "Categoria Exemplo"
}</code></pre>

<h3>9. Atualizar Categoria</h3>
<p><strong>Rota:</strong> <code>PUT /api/categories/{id}</code></p>
<p><strong>Parâmetros:</strong></p>
<ul>
    <li><code>id</code>: ID da categoria (int)</li>
    <li><code>name</code>: Nome da categoria (string)</li>
</ul>
<p><strong>Exemplo de Requisição:</strong></p>
<pre><code>{
    "id": 1,
    "name": "Categoria Atualizada"
}</code></pre>
<p><strong>Exemplo de Resposta:</strong></p>
<pre><code>{
    "type": "success",
    "message": "Categoria atualizada com sucesso!"
}</code></pre>

<h3>10. Excluir Categoria</h3>
<p><strong>Rota:</strong> <code>DELETE /api/categories/{id}</code></p>
<p><strong>Parâmetros:</strong></p>
<ul>
    <li><code>id</code>: ID da categoria (int)</li>
</ul>
<p><strong>Exemplo de Resposta:</strong></p>
<pre><code>{
    "type": "success",
    "message": "Categoria excluída com sucesso!"
}</code></pre>

<h2>Códigos de Status HTTP</h2>
<ul>
    <li><strong>200 OK:</strong> Requisição bem-sucedida.</li>
    <li><strong>201 Created:</strong> Recurso criado com sucesso.</li>
    <li><strong>400 Bad Request:</strong> Requisição inválida ou parâmetros faltando.</li>
    <li><strong>401 Unauthorized:</strong> Autenticação necessária.</li>
    <li><strong>404 Not Found:</strong> Recurso não encontrado.</li>
    <li><strong>500 Internal Server Error:</strong> Erro interno do servidor.</li>
</ul>
</body>
</html>
