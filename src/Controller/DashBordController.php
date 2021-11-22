<?php

namespace Src\Controller;

use Src\Model\Extension;
use Src\Model\General;
use Src\Model\Page;
use Src\Model\Social;
use Src\Model\Twitch;

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

        $general = (new General())->findAll();

        // VERIF IF RESQUEST POST EXIST
        if ($_POST) {
            $request = new General();
            $request->editGeneral();
        }

        $this->render('back-office/general', [
            'general' => $general[0]
        ]);
    }

    #######################
    ## Social Media
    #######################
    function social()
    {
        // GET ALL MEDIAS
        $socials = (new Social())->findAll();

        $this->render('back-office/social', [
            'socials' => $socials,
        ]);
    }

    function socialedit($id)
    {
        // GET ONE MEDIA BY ID
        $social = (new Social)->findByID($id);

        // VERIF IF RESQUEST POST EXIST
        if ($_POST) {
            $request = new Social();
            $request->editSocial($id);
        }

        $this->render('back-office/socialedit', [
            'social' => $social[0],
        ]);
    }

    function socialremove($id)
    {
        // VERIF IF RESQUEST GET EXIST
        if ($_GET) {
            $request = new Social();
            $request->remove($id);
        }
    }

    function socialadd()
    {

        // VERIF IF RESQUEST POST EXIST
        if ($_POST) {
            $request = new Social();
            $request->addSocial();
        }

        $this->render('back-office/socialadd', []);
    }


    #######################
    ## Live
    #######################
    function live()
    {
        $twitch = (new Twitch)->findAll();

        // VERIF IF RESQUEST POST EXIST
        if ($_POST) {
            $request = new Twitch();
            $request->addLink();
        }


        $this->render('back-office/live', [
            'twitch' => $twitch[0],
        ]);
    }

    function twitchapi()
    {
        $twitch = (new Twitch)->findAll();

        // VERIF IF RESQUEST POST EXIST
        if ($_POST) {
            $request = new Twitch();
            $request->addTwitchName();
        }

        $this->render('back-office/twitchapi', [
            'twitch' => $twitch[0],

        ]);
    }

    #######################
    ## Page
    #######################
    function page()
    {
        $page = (new Page)->findAll();

        // VERIF IF RESQUEST POST EXIST
        if ($_POST) {
            $request = new Page();
            $request->editPage();
        }

        $this->render('back-office/page', [
            'page' => $page[0],
        ]);
    }


    #######################
    ## Extention
    #######################
    function extention()
    {
        $extention = (new Extension)->findAll();

        // VERIF IF RESQUEST POST EXIST
        if ($_POST) {
            $request = new Extension();
            $request->editExtensionPage();
        }

        $this->render('back-office/extention', [
            'extention' => $extention[0]
        ]);
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
