<?php

use Src\Function\Sessions;

/**
 * Pro Stream.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */


/**
 *                           [ROUTER URL OPTIONS AND CONFIGURATION]
 *
 * 
 *                       Match all request URIs
 * [i]                   Match an integer
 * [i:id]                Match an integer as 'id'
 * [a:action]            Match alphanumeric characters as 'action'
 * [h:key]               Match hexadecimal characters as 'key'
 * [:action]             Match anything up to the next / or end of the URI as 'action'
 * [create|edit:action]  Match either 'create' or 'edit' as 'action'
 * [*]                   Catch all (lazy, stops at the next trailing slash)
 * [*:trailing]          Catch all as 'trailing' (lazy)
 * [**:trailing]         Catch all (possessive - will match the rest of the URI)
 * .[:format]?           Match an optional parameter 'format' - a / or . before the block is also optional
 */

#######################
## Front Office
#######################

#Home Page
$router->map('GET', '/', function () {
    $controller = new Src\Controller\WebSiteController();
    $controller->home();
});

#Error 404 Page
$router->map('GET', '/error-404', function () {
    $controller = new Src\Controller\WebSiteController();
    $controller->error404();
});

#Projets bio Page
$router->map('GET', '/projets-bio', function () {

    $controller = new Src\Controller\WebSiteController();
    $controller->projetsbio();
});

#Extention Page
$router->map('GET', '/mon-extension', function () {

    $controller = new Src\Controller\WebSiteController();
    $controller->extention();
});

#Commands Page
$router->map('GET', '/les-commandes', function () {

    $controller = new Src\Controller\WebSiteController();
    $controller->commands();
});

#Donation Page
$router->map('GET', '/don-paypal', function () {

    $controller = new Src\Controller\WebSiteController();
    $controller->donation();
});

#Calendar Page
$router->map('GET', '/calendrier-de-mes-streams', function () {
    $controller = new Src\Controller\WebSiteController();
    $controller->calendar();
});

#Deconnexion Page
$router->map('GET', '/deconnexion', function () {
    $controller = new Src\Controller\WebSiteController();
    $controller->deconnexion();
});

#Login Page
$router->map('GET', '/login', function () {
    $controller = new Src\Controller\WebSiteController();
    $controller->login();
});

#Login Page
$router->map('POST', '/login', function () {
    $controller = new Src\Controller\WebSiteController();
    $controller->login();
});

#######################
## Back Office
#######################

#Home page for dashbord
$router->map('GET', '/admin', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->home();
});

#General setting
$router->map('GET', '/admin/general', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->general();
});

$router->map('POST', '/admin/general', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->general();
});

#Live setting
$router->map('GET', '/admin/live', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->live();
});

$router->map('POST', '/admin/live', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->live();
});

#Twitch API setting
$router->map('GET', '/admin/twitch-api', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->twitchapi();
});

$router->map('POST', '/admin/twitch-api', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->twitchapi();
});

#Page setting
$router->map('GET', '/admin/page', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->page();
});

$router->map('POST', '/admin/page', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->page();
});

#Extention setting
$router->map('GET', '/admin/extension', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->extention();
});

$router->map('POST', '/admin/extension', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->extention();
});

#commands setting
$router->map('GET', '/admin/commandes', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->commands();
});

$router->map('POST', '/admin/commandes', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->commands();
});

$router->map('GET', '/admin/commandes/add', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->commandsadd();
});

$router->map('POST', '/admin/commandes/add', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->commandsadd();
});

$router->map('GET', '/admin/commandes/[i:id]', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->commandsedit($id);
});

$router->map('POST', '/admin/commandes/[i:id]', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->commandsedit($id);
});

$router->map('GET', '/admin/commandes/[i:id]/remove', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->commandsremove($id);
});

$router->map('GET', '/admin/commandes/categorie', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->commandscategory();
});

$router->map('GET', '/admin/commandes/categorie/add', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->commandscategoryadd();
});

$router->map('POST', '/admin/commandes/categorie/add', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->commandscategoryadd();
});

$router->map('GET', '/admin/commandes/categorie/[i:id]', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->commandscategoryedit($id);
});

$router->map('POST', '/admin/commandes/categorie/[i:id]', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->commandscategoryedit($id);
});

$router->map('GET', '/admin/commandes/categorie/[i:id]/remove', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->commandscategoryremove($id);
});

#donation setting
$router->map('GET', '/admin/donation', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->donation();
});

$router->map('POST', '/admin/donation', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->donation();
});

#calendar setting
$router->map('GET', '/admin/calendrier', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->calendar();
});

$router->map('GET', '/admin/calendrier/add', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->calendaradd();
});

$router->map('POST', '/admin/calendrier/add', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->calendaradd();
});

$router->map('GET', '/admin/calendrier/[i:id]', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->calendaredit($id);
});

$router->map('POST', '/admin/calendrier/[i:id]', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->calendaredit($id);
});

$router->map('GET', '/admin/calendrier/[i:id]/remove', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->calendarremove($id);
});

#users setting
$router->map('GET', '/admin/utilisateur', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->users();
});

$router->map('GET', '/admin/utilisateur/[i:id]', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->usersedit($id);
});

$router->map('POST', '/admin/utilisateur/[i:id]', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->usersedit($id);
});

$router->map('GET', '/admin/utilisateur/add', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->usersadd();
});

$router->map('POST', '/admin/utilisateur/add', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->usersadd();
});

$router->map('GET', '/admin/utilisateur/[i:id]/remove', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->usersremove($id);
});

#social setting
$router->map('GET', '/admin/social-link', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->social();
});

$router->map('GET', '/admin/social-link/[i:id]', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->socialedit($id);
});

$router->map('POST', '/admin/social-link/[i:id]', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->socialedit($id);
});

$router->map('GET', '/admin/social-link/[i:id]/remove', function ($id) {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->socialremove($id);
});

$router->map('GET', '/admin/social-link/add', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->socialadd();
});

$router->map('POST', '/admin/social-link/add', function () {
    //VERIF IS ADMIN
    $session = (new Sessions());
    $session->verifIsAdmin();

    $controller = new Src\Controller\DashBordController();
    $controller->socialadd();
});
