<?php

namespace Source\App;

use League\Plates\Engine;

class Web
{
    private $view;

public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/web","php");
    }

    public function home ()
    {
        
        echo $this->view->render("home",[]);
    }


    public function about ()
    {
       
        echo $this->view->render("about",[]);
    }


    public function login(): void
    {
        echo $this->view->render("login",[]);
    }
    public function register(): void
    {
        echo $this->view->render("register",[]);
    }
     public function sunglasses ()
    {
       
        echo $this->view->render("sunglasses",[]);
    }

    public function acessories ()
    {
       
        echo $this->view->render("acessories",[]);
    }

    public function degree ()
    {
       
        echo $this->view->render("degree",[]);
    }
    public function profile ()
    {
       
        echo $this->view->render("profile",[]);
    }

    public function error (array $data)
    {
        var_dump($data);
    }

}