<?php

namespace Src\Function;

use Src\Model\Model;

class Sessions extends Model
{

    // CREATE TEST USER
    // $password = password_hash('root', PASSWORD_BCRYPT);
    // $stmt = $this->dbConnect()->prepare("INSERT INTO `user`(`id`, `email`, `password`, `rank`, `banned`) VALUES (NULL,'root@root.fr','$password',2,0)");
    // $stmt->execute();

    function connexion()
    {

        if (!empty($_POST['email']) && !empty($_POST['password'])) {

            //TAKE USER INFO AND PROTECT BY HTMLSPECIALCHARS
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            //CONNECT TO DATA BASE FOR TEST USERINFO
            $stmt = $this->dbConnect()->prepare("SELECT * FROM `user` WHERE `email` = ?");
            $stmt->execute(array($email));
            $items = $stmt->fetch(\PDO::FETCH_ASSOC);
            //VERIFY IF EMAIL EXIST
            if (!empty($items)) {
                //IF EMAIL EXIST SO TESTING A PASSWORD CREDENTIAL
                if (password_verify($password, $items['password'])) {

                    $_SESSION['email'] = $items['email'];
                    $_SESSION['rank'] = $items['rank'];
                    $_SESSION['banned'] = $items['banned'];
                    $_SESSION['avatar'] = $items['avatar'];

                    header("location: /");
                } else {
                    header("location: /login?error=1");
                }
            } else {
                header("location: /login?error=1");
            }
        } else {
            header("location: /login?error=1");
        }
    }

    function sessionDestroy()
    {
        session_destroy();
        header("location: /");
    }

    function verifSessionExist()
    {
        if (!empty($_SESSION['email'])) {
            header("location: /");
        }
    }

    function verifIsAdmin()
    {
        if (!empty($_SESSION['email'])) {
            if ($_SESSION['rank'] != 2) {
                header("location: /error-404");
            }
        } else {
            header("location: /login");
        }
    }
}
