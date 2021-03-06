<?php

use Src\Function\WebsiteConfig;

####
# SESSION
####
session_start();

###
# AUTOLOAD
###
require_once '../vendor/autoload.php';

###
# GENERAL CONFIG
###
WebsiteConfig::generalConfig();

####
# INIT ROUTE
####
$router = new AltoRouter();
require_once '../config/routes.php';

# call closure or throw 404 status CALL CLOSURE OR THROW 404 STATUS
$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    # NO ROUTE WAS WATCHED
    header('location: /error-404');
    exit();
}
