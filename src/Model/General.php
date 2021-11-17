<?php

namespace Src\Model;

use Src\Entity\EntityGeneral;

class General extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityGeneral();
        $this->table = 'general';
    }


    /**
     * Edit general website config
     *
     * @return void
     */
    public function editgeneral()
    {

        if (!empty($_FILES['logo']['name'])) {
            $path = $_FILES['logo']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $newfilename = md5(uniqid(rand(), true)) . "." . $ext;
            move_uploaded_file($_FILES['logo']['tmp_name'], "upload/img/$newfilename");
            $linkfile = "/upload/img/$newfilename";
            $stmt = $this->dbConnect()->prepare("UPDATE general SET logo = '$linkfile' WHERE 1");
            $stmt->execute();
        }

        if (!empty($_POST['title'])) {
            $value = $_POST['title'];
            $stmt = $this->dbConnect()->prepare("UPDATE general SET title = '$value' WHERE 1");
            $stmt->execute();
        }

        if (!empty($_POST['description'])) {
            $value = $_POST['description'];
            $stmt = $this->dbConnect()->prepare("UPDATE general SET description = '$value' WHERE 1");
            $stmt->execute();
        }

        if (!empty($_POST['email'])) {
            $value = $_POST['email'];
            $stmt = $this->dbConnect()->prepare("UPDATE general SET email = '$value' WHERE 1");
            $stmt->execute();
        }

        if (!empty($_POST['maintenance'])) {
            $value = $_POST['maintenance'];
            $stmt = $this->dbConnect()->prepare("UPDATE general SET maintenance = '$value' WHERE 1");
            $stmt->execute();
        }
    }
}
