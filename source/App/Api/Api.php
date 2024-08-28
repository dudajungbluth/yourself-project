<?php

namespace Source\App\Api;

// Introduzindo token de segurança JWT

use Source\Core\TokenJWT;

class Api
{
    protected $headers;
    protected $userAuth = false;

    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
        $this->headers = getallheaders();

        if(!empty($this->headers["token"]) || isset($this->headers["token"])){
            $jwt = new TokenJWT();
            if($jwt->verify($this->headers["token"])){
                $this->userAuth = $jwt->token->data;
            }
        }
    }

    protected function back (array $response, int $code = 200) : void
    {
        http_response_code($code);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

 /**
     * @return void
     * @description Verifica se o usuário está autenticado
     */
    protected function auth (): void
    {
        if (!$this->userAuth){
            $response = [
                "error" => [
                    "code" => "401",
                    "type" => "unauthorized",
                    "message" => "Usuário não autorizado e/ou token expirado"
                ]
            ];
            $this->back($response, 401);
            exit();
        }
    }

}