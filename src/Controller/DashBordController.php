<?php

namespace Src\Controller;

use Src\Model\General;

/**
 * This Class it's for admin dashbord controller.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package Src\Controller
 */
class DashBordController
{

    #######################
    ## Home
    #######################
    function home()
    {
        $this->render('back-office/home', []);
    }

    #######################
    ## General
    #######################
    function general()
    {

        if ($_POST) {
            $request = new General();
            $request->editgeneral();
        }

        $this->render('back-office/general', []);
    }

    #######################
    ## Social Media
    #######################
    function social()
    {
        $this->render('back-office/social', []);
    }

    function socialedit($id)
    {
        $this->render('back-office/socialedit', []);
    }

    function socialremove($id)
    {
    }

    function socialadd()
    {
        $this->render('back-office/socialadd', []);
    }


    #######################
    ## Live
    #######################
    function live()
    {
        $installed = 0;
        $clientkey = "";

        $this->render('back-office/live', [
            'installed' => $installed,
            'clientkey' => $clientkey,
        ]);
    }

    function twitchapi()
    {

        $this->render('back-office/twitchapi', []);
    }

    #######################
    ## Page
    #######################
    function page()
    {
        $this->render('back-office/page', []);
    }


    #######################
    ## Extention
    #######################
    function extention()
    {
        $this->render('back-office/extention', []);
    }

    #######################
    ## Commands
    #######################
    function commands()
    {
        $this->render('back-office/commands', []);
    }

    function commandsremove($id)
    {
    }

    function commandsedit($id)
    {
        $this->render('back-office/commandsedit', []);
    }

    function commandsadd()
    {
        $this->render('back-office/commandsadd', []);
    }

    function commandscategory()
    {
        $this->render('back-office/commandscategory', []);
    }

    function commandscategoryremove($id)
    {
    }

    function commandscategoryedit($id)
    {
        $this->render('back-office/commandscategoryedit', []);
    }

    function commandscategoryadd()
    {
        $this->render('back-office/commandscategoryadd', []);
    }

    #######################
    ## Donation
    #######################
    function donation()
    {
        $this->render('back-office/donation', []);
    }

    #######################
    ## Calendar
    #######################
    function calendar()
    {
        $this->render('back-office/calendar', []);
    }

    function calendaradd()
    {
        $this->render('back-office/calendaradd', []);
    }

    function calendarremove($id)
    {
    }

    function calendaredit($id)
    {
        $this->render('back-office/calendaredit', []);
    }

    #######################
    ## Users
    #######################
    function users()
    {
        $this->render('back-office/users', []);
    }

    function usersedit($id)
    {
        $this->render('back-office/usersedit', []);
    }

    function usersremove($id)
    {
    }

    #######################
    ## ROUTE RENDER
    #######################
    protected function render(string $viewName, array $args)
    {
        $loader = new \Twig\Loader\FilesystemLoader('../view/back-office');
        $twig = new \Twig\Environment($loader, [
            'cache' => '../cache',
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
