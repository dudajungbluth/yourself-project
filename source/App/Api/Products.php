<?php

namespace Source\App\Api;

use Source\Models\Product;
use Source\Core\TokenJWT;
error_reporting(E_ERROR | E_PARSE);
class Products extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertProduct(array $data)
    {
        $this->auth(); // Validação de autenticação

        if (in_array("", $data)) {
            $this->back([
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $product = new Product(
            null,
            $data["name"],
            $data["price"],
            $data["amount"],
            $data["url_products"],
            $data["description"],
            $data["categories_id"]
        );

        if (!$product->insert()) {
            $this->back([
                "type" => "error",
                "message" => $product->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => "Produto cadastrado com sucesso!"
        ]);
    }

    public function updateProduct(array $data): void
    {
        $this->auth(); // Validação de autenticação

        $product = new Product(
            $data["id"],
            $data["name"],
            $data["price"],
            $data["amount"],
            $data["url_products"],
            $data["description"],
            $data["categories_id"]
        );

        if (!$product->updateProduct()) {
            $this->back([
                "type" => "error",
                "message" => $product->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => "Produto atualizado com sucesso!"
        ]);
    }

    public function deleteProduct(array $data)
    {
        $this->auth(); // Validação de autenticação

        $service = new Product();

        if (!$service->deleteProduct($data["id"])) {
            $this->back([
                "type" => "error",
                "message" => $service->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => "Produto excluído com sucesso!"
        ]);
    }

    public function listProduct()
    {
        $product = new Product();
        $listProducts = $product->listProduct();
        $this->back($listProducts);
    }

    public function listById(array $data)
    {
        $service = new Product();
        $product = $service->listById($data["id"]);
        $this->back($product);
    }
}
