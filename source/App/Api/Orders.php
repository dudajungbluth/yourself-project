<?php

namespace Source\App\Api;

use Source\Models\Order;
use Source\Core\TokenJWT;
error_reporting(E_ERROR | E_PARSE);
class Orders extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertOrder(array $data)
    {
        $this->auth();

        if (in_array("", $data)) {
            $this->back([
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $order = new Order(
            null,
            $data["total"],
            $data["quantity"],
            $data["description"],
            $data["users_id"]
        );

        if (!$order->insert()) {
            $this->back([
                "type" => "error",
                "message" => $order->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => "Pedido cadastrado com sucesso!"
        ]);
    }

    public function updateOrder(array $data): void
    {
        $this->auth();

        $order = new Order(
            $data["id"],
            $data["total"],
            $data["quantity"],
            $data["description"],
            $data["users_id"]
        );

        if (!$order->updateOrder()) {
            $this->back([
                "type" => "error",
                "message" => $order->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => "Pedido atualizado com sucesso!"
        ]);
    }

    public function deleteOrder(array $data)
    {
        $this->auth();

        $order = new Order();

        if (!$order->deleteOrder($data["id"])) {
            $this->back([
                "type" => "error",
                "message" => $order->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => "Pedido excluído com sucesso!"
        ]);
    }

    public function listOrder(array $data)
    {
        $order = new Order();
        $listOrder = $order->listOrder($data);
        $this->back($listOrder);
    }

    public function listById(array $data)
    {
        $order = new Order();
        $orderData = $order->getOrderById($data["id"]);
        $this->back($orderData);
    }
}
