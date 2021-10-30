<?php

namespace Src\Controller;

/**
 * This Class it's for front controller.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package Src\Controller
 */
class WebSiteController
{

    #######################
    ## 404
    #######################
    function error404()
    {
        $this->render('front-office/404', []);
    }

    #######################
    ## HOME
    #######################
    function home()
    {
        $this->render('front-office/home', []);
    }

    #######################
    ## PROJETS BIO
    #######################
    function projetsbio()
    {
        $this->render('front-office/bio', []);
    }

    #######################
    ## EXTENTION
    #######################
    function extention()
    {
        $this->render('front-office/extention', []);
    }

    #######################
    ## COMMANDS
    #######################
    function commands()
    {
        $this->render('front-office/commands', []);
    }

    #######################
    ## DONATION
    #######################
    function donation()
    {
        $this->render('front-office/donation', []);
    }

    #######################
    ## CALENDAR
    #######################
    function calendar()
    {
        $this->render('front-office/calendar', []);
    }


    #######################
    ## ROUTE RENDER
    #######################
    protected function render(string $viewName, array $args)
    {
        $loader = new \Twig\Loader\FilesystemLoader('../view/front-office');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);

        $twig->addGlobal('session', $_SESSION);
        $twig->addGlobal('post', $_POST);
        $twig->addGlobal('get', $_GET);

        $folder = explode('/', $viewName);
        echo $twig->render($folder[1] . '.html.twig', $args);
    }
}
