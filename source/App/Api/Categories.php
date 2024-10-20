<?php

namespace Source\App\Api;

use Source\Models\Category;
use Source\Core\TokenJWT;
error_reporting(E_ERROR | E_PARSE);
class Categories extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertCategory(array $data)
    {
        $this->auth();

        if (in_array("", $data)) {
            $this->back([
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $category = new Category(null, $data["name"]);

        if (!$category->insert()) {
            $this->back([
                "type" => "error",
                "message" => $category->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => "Categoria cadastrada com sucesso!"
        ]);
    }

    public function updateCategory(array $data): void
    {
        $this->auth();

        $category = new Category(
            $data["id"],
            $data["name"]
        );

        if (!$category->updateCategory()) {
            $this->back([
                "type" => "error",
                "message" => $category->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => "Categoria atualizada com sucesso!"
        ]);
    }

    public function deleteCategory(array $data)
    {
        $this->auth();

        $category = new Category();

        if (!$category->deleteCategory($data["id"])) {
            $this->back([
                "type" => "error",
                "message" => $category->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => "Categoria excluída com sucesso!"
        ]);
    }

    public function listCategory(array $data)
    {
        $category = new Category();
        $listCategories = $category->listCategory($data);
        $this->back($listCategories);
    }

    public function listById(array $data)
    {
        $service = new Category();
        $category = $service->getCategoryById($data["id"]);
        $this->back($category);
    }
}
