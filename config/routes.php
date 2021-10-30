<?php

/**
 * Pro Stream.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */


/**
 *                           [ROUTER URL OPTIONS AND CONFIGURATION]
 *
 * 
 * *                     Match all request URIs
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

#calendar Page
$router->map('GET', '/calendrier-de-mes-streams', function () {
    $controller = new Src\Controller\WebSiteController();
    $controller->calendar();
});
