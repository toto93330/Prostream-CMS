<?php

namespace Src\Model;

use Src\Entity\EntityUser;

class User extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityUser();
        $this->table = 'user';
    }


    function addUser()
    {

        if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password-confirm'])) {

            $password = htmlspecialchars($_POST['password']);
            $passwordconfirm = htmlspecialchars($_POST['password-confirm']);

            if ($password ==  $passwordconfirm) {

                $password = password_hash($password, PASSWORD_BCRYPT);

                $email = htmlspecialchars($_POST['email']);
                $rank = htmlspecialchars($_POST['rank']);
                $banned = htmlspecialchars($_POST['banned']);

                //VERIF IF EMAIL EXIST ON DATABASE
                $stmt = $this->dbConnect()->prepare("SELECT * FROM `user` WHERE email = ?");
                $stmt->execute(array($email));
                $items = $stmt->fetch(\PDO::FETCH_ASSOC);

                if (!empty($items)) {
                    header("location: /admin/utilisateur/add?error=2");
                    exit();
                }

                // UPLOAD AVATAR
                $path = $_FILES['avatar']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $newfilename = md5(uniqid(rand(), true)) . "." . $ext;
                move_uploaded_file($_FILES['avatar']['tmp_name'], "upload/img/$newfilename");
                $linkfile = "/upload/img/$newfilename";

                $stmt = $this->dbConnect()->prepare("INSERT INTO `user`(`id`, `email`, `avatar`, `password`, `rank`, `banned`) VALUES (NULL, ? , ? , ? , ? , ? )");
                $stmt->execute(array($email, $linkfile, $password, $rank, $banned));


                header("location: /admin/utilisateur?add=1");
            } else {
                header("location: /admin/utilisateur/add?error=1");
            }
        } else {
            header("location: /admin/utilisateur/add?error=1");
        }
    }

    function editUser($id)
    {

        var_dump($_FILES['avatar']['name']);

        if (!empty($_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
            $banned = htmlspecialchars($_POST['banned']);
            $rank = htmlspecialchars($_POST['rank']);

            $stmt = $this->dbConnect()->prepare("UPDATE $this->table SET `email` = ? , `rank` = ? , `banned` = ? WHERE `id` = $id");
            $stmt->execute(array($email, $rank, $banned));

            //IF SUMITED
            $modified = 1;
        }

        if (!empty($_FILES['avatar']['name'])) {
            $path = $_FILES['avatar']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $newfilename = md5(uniqid(rand(), true)) . "." . $ext;
            move_uploaded_file($_FILES['avatar']['tmp_name'], "upload/img/$newfilename");
            $linkfile = "/upload/img/$newfilename";
            $stmt = $this->dbConnect()->prepare("UPDATE $this->table SET `avatar` = '$linkfile' WHERE id = $id");
            $stmt->execute();

            //IF SUMITED
            $modified = 1;
        }

        if (($_POST['password'] == $_POST['password-confirm']) && (!empty($_POST['password']) && !empty($_POST['password-confirm']))) {

            $psw = htmlspecialchars($_POST['password']);
            $password = password_hash($psw, PASSWORD_BCRYPT);
            $stmt = $this->dbConnect()->prepare("UPDATE $this->table SET `password` = $password WHERE id = $id");
            $stmt->execute();

            //IF SUMITED
            $modified = 1;
        }

        if ($modified == 1) {
            header("location: /admin/utilisateur/$id?success=1");
        }
    }
}
