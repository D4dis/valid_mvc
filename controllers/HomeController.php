<?php


class HomeController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function index()
    {
        $title = 'Accueil';
        $this->render('home/home', ['title' => $title]);
    }

    private function render($view, $data = [])
    {
        extract($data);
        require_once "views/{$view}.php";
    }
}

