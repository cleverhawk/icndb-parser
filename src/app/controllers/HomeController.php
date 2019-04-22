<?php

namespace SmartHawk\controllers;

use SmartHawk\services\PagesService;
use \Twig_Environment;

class HomeController
{
    /**
     * @var Twig_Environment
     */
    protected $twig;

    /**
     * @var PagesService
     */
    protected $service;

    /**
     * HomeController constructor.
     * @param Twig_Environment $twig
     */
    public function __construct(\Twig_Environment $twig, PagesService $service)
    {
        $this->twig = $twig;
        $this->service = $service;
    }

    public function home()
    {
        echo $this->twig->render('home.twig', [
            'categoryList' => $this->service->getCategories(),
        ]);
    }

    public function send($limitTo, $email)
    {
        $joke = $this->service->getJoke($limitTo);

        echo $this->twig->render('send.twig', [
            'joke' => $joke,
            'email' => $email,
            'isSend' => $this->service->send($joke, $email, $limitTo) ? 'Да' : 'Нет',
            'isWrite' => $this->service->write($joke, $email) ? 'Да' : 'Нет',
        ]);
    }
}