<?php

namespace Src\Functions;

use Src\Functions\Connexion;

/**
 * This Class it's for Twitch TV.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Functions
 */

class Twitch
{

    /**
     * Return dbConnect() for connexion with singleton PDO style.
     * @return array
     */
    static protected function dbConnect()
    {
        return Connexion::dbConnect();
    }


    public function getViewer()
    {
    }

    public function getTitle()
    {
    }

    public function getOnline()
    {
    }
}
