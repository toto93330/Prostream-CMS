<?php

namespace Src\Function;

use Src\Function\Connexion;
use Src\Model\Twitch as ModelTwitch;

/**
 * This Class it's for Twitch TV.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Functions
 */

class Twitch
{

    private    $clientid;
    private    $accesstoken;
    private    $userid;


    function __construct()
    {
        $data = (new ModelTwitch())->findAll();

        $this->clientid = $data[0]->getClientkey();
        $this->accesstoken = $data[0]->getAccesstoken();
        $this->userid = $data[0]->getUserkey();
    }



    // public function first()
    // {
    //     if (empty($this->accesstoken) || empty($this->userid)) {

    //         // IMPORTNAT : VERSION 2 LE LIEN EST PLUS ADAPTER A UN BOUTON 
    //         // /* 
    //         // DEFINITION DE L'ACCES TOKEN DU COMPTE TWITCH
    //         // IMPORTANT : BIEN METTRE URL DE VOTRE SITE SUIVIE DE /twitchmodul/install DANS LA DECLARATION DE VOTRE APIKEY TWITCH
    //         // */
    //         // $auth = 'https://id.twitch.tv/oauth2/authorize?response_type=token+id_token&client_id=' . $this->clientid . '&redirect_uri=' . $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/twitchmodul/install" . '&scope=user:read:follows%20viewing_activity_read+openid&state=c3ab8aa609ea11e793ae92361f002671&claims={"id_token":{"email_verified":null}}';
    //         // $curl = curl_init($auth);

    //         // curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    //         //     "Cache-Control: no-cache",
    //         //     "content-type:application/json;charset=utf-8"
    //         // ));

    //         // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //         // $data = json_decode(curl_exec($curl));
    //         // curl_close($curl);


    //         /* DEFINITION DE L'ID UNIQUE DE LA CHAINE TWITCH */
    //         $auth = 'https://api.twitch.tv/helix/users';
    //         $curl = curl_init($auth);

    //         curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    //             "Cache-Control: no-cache",
    //             "content-type:application/json;charset=utf-8",
    //             "Authorization: Bearer $this->accesstoken",
    //             "Client-ID: $this->clientid"
    //         ));
    //         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //         $data = json_decode(curl_exec($curl));
    //         curl_close($curl);

    //         // on ajoute l'id et du nom de la chaine twitch dans la bdd

    //         var_dump($data);
    //     }
    // }


    private function initTwitchModul()
    {

        #Si les variable accesstoken et userid existe dans la BDD on initialise l'objet 
        #Sinon on renvoie sur la page d'installation du module
        if (!empty($this->accesstoken) && !empty($this->userid)) {

            $auth = "https://api.twitch.tv/helix/streams?user_id=" . $this->userid;
            $curl = curl_init($auth);

            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                "Cache-Control: no-cache",
                "content-type:application/json;charset=utf-8",
                "Authorization: Bearer $this->accesstoken",
                "Client-ID: $this->clientid"
            ));

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $data = curl_exec($curl);
            curl_close($curl);
            return $data;
        } else {
            return header('location: /dashbord/twitch');
        }
    }

    public function getStreamInfo()
    {
        $data = $this->initTwitchModul();

        $data = json_decode($data);

        if (!empty($data->data)) {

            $data = json_encode($data);
            $data = json_decode($data, true);
            $data = ['data' => ['title' => $data['data'][0]['title'], 'viewer_count' => $data['data'][0]['viewer_count'], 'game_name' => $data['data'][0]['game_name'], 'is_mature' => $data['data'][0]['is_mature'], 'is_online' => true]];
            $data = json_decode(json_encode($data), FALSE);

            return $data->data;
        } else {
            $object = ['data' => ['title' => "Stream Offline", 'viewer_count' => 0, 'game_name' => "Stream Offline", 'is_mature' => "Stream Offline", 'is_online' => false]];
            $object = json_decode(json_encode($object), FALSE);

            return $object->data;
        }
    }
}
