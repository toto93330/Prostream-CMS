<?php

namespace Src\Controller;

use Src\Model\Page;
use Src\Model\General;
use Src\Model\Calendar;
use Src\Model\Commands;
use Src\Model\Donation;
use Src\Function\Twitch;
use Src\Model\Extension;
use Src\Function\Session;
use Src\Function\Sessions;
use Src\Model\CalendarDay;
use Src\Model\CommandsCategory;

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
    ## Login
    #######################
    function login()
    {
        $session = (new Sessions());
        $session->verifSessionExist();

        if ($_POST) {
            $session->connexion();
        }

        $this->render('front-office/login', []);
    }


    #######################
    ## DECONNEXION
    #######################
    function deconnexion()
    {
        $session = new Sessions();
        $session->sessionDestroy();
    }

    #######################
    ## HOME
    #######################
    function home()
    {
        $twitch = new Twitch();
        //GET STREAM STATUS
        $channeltitle = $twitch->getTitle();
        $channelviewers = $twitch->getViews();
        $channelname = $twitch->getChannelName();
        //GET STREAM LINK
        $linksubscribe = $twitch->getLinkSubcribe();
        $linkbits = $twitch->getLinkBits();
        $linkreplay = $twitch->getLinkReplay();
        $linkboutique = $twitch->getLinkShop();

        $this->render('front-office/home', [
            'channeltitle' => $channeltitle,
            'channelviewers' => $channelviewers,
            'channelname' => $channelname,
            'linksubscribe' => $linksubscribe,
            'linkbits' => $linkbits,
            'linkreplay' => $linkreplay,
            'linkboutique' => $linkboutique,
        ]);
    }

    #######################
    ## PROJETS BIO
    #######################
    function projetsbio()
    {

        // INIT PAGE OBJECT
        $page = (new Page())->findAll();

        $this->render('front-office/bio', [
            'page' => $page[0]
        ]);
    }

    #######################
    ## EXTENTION
    #######################
    function extention()
    {

        // INIT EXTENSION PAGE OBJECT
        $extension = (new Extension())->findAll();

        $this->render('front-office/extention', [
            'extension' => $extension[0]
        ]);
    }

    #######################
    ## COMMANDS
    #######################
    function commands()
    {

        $commands = (new Commands())->findAll();
        $commandscategory = (new CommandsCategory)->findAll();


        $this->render('front-office/commands', [
            'commands' => $commands,
            'category' => $commandscategory,
        ]);
    }

    #######################
    ## DONATION
    #######################
    function donation()
    {

        // INIT DONATION PAGE OBJECT
        $donation = (new Donation())->findAll();


        $this->render('front-office/donation', [
            'donation' => $donation[0],
        ]);
    }

    #######################
    ## CALENDAR
    #######################
    function calendar()
    {
        $events = (new Calendar())->findAllOrderEventStart();
        $days = (new CalendarDay())->findAll();

        $this->render('front-office/calendar', [
            'events' => $events,
            'days' => $days,
        ]);
    }


    #######################
    ## ROUTE RENDER
    #######################
    protected function render(string $viewName, array $args)
    {
        $loader = new \Twig\Loader\FilesystemLoader('../view/front-office');
        $twig = new \Twig\Environment($loader, [
            //'cache' => '../cache',
            'debug' => false,
        ]);

        $twig->addExtension(new \Twig\Extension\DebugExtension());

        $twig->addGlobal('session', $_SESSION);
        $twig->addGlobal('post', $_POST);
        $twig->addGlobal('get', $_GET);
        $twig->addGlobal('server', $_SERVER);

        $folder = explode('/', $viewName);
        echo $twig->render($folder[1] . '.html.twig', $args);
    }
}
