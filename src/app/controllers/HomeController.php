<?php

namespace SmartHawk\controllers;

use \Twig_Environment;

class HomeController
{
    /**
     * @var Twig_Environment
     */
    protected $twig;

    /**
     * HomeController constructor.
     * @param Twig_Environment $twig
     */
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function home()
    {
        echo $this->twig->render('home.twig', [
            'categoryList' => ['111', '2222'],
        ]);
    }

    public function send()
    {
        echo $this->twig->render('send.twig', [
            'result' => true,
            'joke' => 'this is cool joke',
            'email' => 'this is email',
        ]);
    }
}