<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

ob_start();

$route = new Router(url(), ":");

$route->namespace("Source\App");

$route->group(null);

$route->get("/", "Web:home");
$route->get("/sobre", "Web:about");
$route->get("/acessorios", "Web:acessories");
$route->get("/entrar", "Web:login");
$route->get("/cadastro", "Web:register");
$route->get("/carrinho-compras","Web:cart");
$route->get("/oculos-sol","Web:sunglasses");
$route->get("/oculos-grau","Web:degree");
$route->get("/perfil","Web:profile");

$route->group("/app");

$route->get("/perfil", "App:profile");

$route->group(null);

$route->group("/admin");


$route->get("/", "Admin:login");
$route->get("/inicio", "Admin:home");
$route->get("/editar-produtos", "Admin:edit_product");
$route->get("/editar-usuario", "Admin:edit_user");
$route->get("/editar-categoria", "Admin:edit_categ");

$route->get("/encomendas", "Admin:orders");
$route->get("/produtos", "Admin:products");

$route->get("/ops/{errcode}", "Web:error");

$route->group(null);

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();