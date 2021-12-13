<?php

namespace Src\Function;

use Src\Function\Connexion;

/**
 * This Class it's for General Config.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Functions
 */


class WebsiteConfig
{

    /**
     * Return dbConnect() for connexion with singleton PDO style.
     * @return object
     */
    static protected function dbConnect()
    {
        return Connexion::dbConnect();
    }

    /**
     * DEFINE GENERAL SETTINGS
     * @return void 
     */
    static function generalConfig()
    {
        $stmt = self::dbConnect()->prepare("SELECT * FROM general");
        $stmt->execute();
        $items = $stmt->fetch();

        define('_SITETITLE', $items['title']);
        define('_DESCRIPTION', $items['description']);
        define('_EMAIL', $items['email']);
        define('_LOGO', $items['logo']);
        define('_GOOGLEAPI', $items['googleapi']);
    }
}
