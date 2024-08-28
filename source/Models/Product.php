<?php 

namespace Source\Models;

use PDOException;
use Source\Core\Connect;
use Source\Core\Model;

class Product extends Model
{
    private $id;
    private $name;
    private $price;
    private $amount;
    private $description;
    private $categoriesId;
    private $urlProducts;
    private $message;

    public function __construct(
        int $id = null,
        string $name = null,
        float $price = null,
        int $amount = null,
        string $description = null,
        string $urlProducts = null,
        int $categoriesId = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
        $this->description = $description;
        $this->urlProducts = $urlProducts;
        $this->categoriesId = $categoriesId;
        $this->entity = "products";
    }

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getCategoriesId(): ?int
    {
        return $this->categoriesId;
    }

    public function getUrlProducts(): ?string
    {
        return $this->urlProducts;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setCategoriesId(int $categoriesId): void
    {
        $this->categoriesId = $categoriesId;
    }

    public function setUrlProducts(string $urlProducts): void
    {
        $this->urlProducts = $urlProducts;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    

    public function listById(int $id)
    {
        $query = "SELECT products.id, products.name, products.price, products.amount, products.url_products, products.description, 
                  categories_id
                  FROM products
                  INNER JOIN categories ON products.categories_id = categories.id
                  WHERE products.id = :id";

        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function listByCategory(int $categoryId): array
    {
        $query = "SELECT services.id, services.name, services.description, 
                  services_categories.name as 'category_name'
                  FROM services
                  INNER JOIN services_categories ON services.service_category_id = services_categories.id
                  WHERE services_categories.id = :category_id";
        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam("category_id", $categoryId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insert(): ?int
    {
        $conn = Connect::getInstance();

        $query = "SELECT * FROM products WHERE name LIKE :name";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $this->message = "Produto já cadastrado!";
            return false;
        }

        $query = "INSERT INTO products (name, price, amount, description, url_products, categories_id) 
        VALUES (:name, :price, :amount, :description, :url_products, :categories_id)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":url_products", $this->urlProducts);
        $stmt->bindParam(":categories_id", $this->categoriesId);

        try {
            $stmt->execute();
            return $conn->lastInsertId();
        } catch (PDOException) {
            $this->message = "Por favor, informe todos os campos.";
            return false;
        }
    }

    public function listProduct()
    {
        $conn = Connect::getInstance();
        $query = "SELECT * FROM products";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateProduct(): bool
{
    $conn = Connect::getInstance();

    
    $currentData = $this->listById($this->id);
    if (!$currentData) {
        $this->message = "Produto não encontrado.";
        return false;
    }

  

    $checkQuery = "SELECT name FROM products WHERE name = :name AND id != :id";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bindParam(":name", $this->name);
    $checkStmt->bindParam(":id", $this->id);
    $checkStmt->execute();

    if ($checkStmt->rowCount() === 1) {
        $this->message = "Nome já cadastrado.";
        return false;
    }

    $query = "UPDATE products 
              SET products.name = :name, 
                  products.price = :price, 
                  products.amount = :amount, 
                  products.url_products = :url_products, 
                  products.description = :description, 
                  products.categories_id = :categories_id 
              WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":amount", $this->amount);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":url_products", $this->urlProducts);
    $stmt->bindParam(":categories_id", $this->categoriesId);

    try {
        $stmt->execute();
        $this->message = "Produto atualizado com sucesso.";
        return true;
    } catch (PDOException) {
        $this->message = "Erro ao atualizar o produto.";
        return false;
    }
}


    public function deleteProduct(int $id): bool
    {
        $conn = Connect::getInstance();

        $checkQuery = "SELECT id FROM products WHERE id = :id";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bindParam(":id", $id);

        try {
            $checkStmt->execute();

            if ($checkStmt->rowCount() === 0) {
                $this->message = "Produto não encontrado.";
                return false;
            }

            // Deleta o produto
            $query = "DELETE FROM products WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);

            $stmt->execute();
            $this->message = "Produto excluído com sucesso.";
            return true;

        } catch (PDOException) {
            // Trata exceções do banco de dados
            $this->message = "Erro ao excluir o produto.";
            return false;
        }
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }
}
