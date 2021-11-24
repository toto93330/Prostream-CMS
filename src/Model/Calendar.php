<?php

namespace Src\Model;

use DateTime;
use Src\Entity\EntityCalendar;

class Calendar extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityCalendar();
        $this->table = 'modul_calendar';
    }

    /**
     * Find All defined items on database
     *
     * @return object
     */
    public function findAllOrderEventStart()
    {
        $list = [];

        $week = (new DateTime())->getTimestamp();
        $week = date('W', $week);

        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table WHERE week = $week ORDER BY dayID, starteventat ASC");
        $stmt->execute();
        $items = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($items as $articleRaw) {
            $list[] = $this->getInstance($articleRaw, $this->entity);
        }

        return $list;
    }


    function editCalendar($id)
    {
        var_dump($_POST);

        if (!empty($_POST['day']) && !empty($_POST['start']) && !empty($_POST['end']) && !empty($_POST['title']) && !empty($_POST['fullday']) && !empty($_POST['actived'])) {


            if (!empty($_FILES['image']['name'])) {
                $path = $_FILES['image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $newfilename = md5(uniqid(rand(), true)) . "." . $ext;
                move_uploaded_file($_FILES['image']['tmp_name'], "upload/img/$newfilename");
                $linkfile = "/upload/img/$newfilename";

                $stmt = $this->dbConnect()->prepare("UPDATE $this->table SET `image` = '$linkfile' WHERE `id` = $id");
                $stmt->execute();
            }

            $day = htmlspecialchars($_POST['day']);
            $start = htmlspecialchars($_POST['start']);
            $end = htmlspecialchars($_POST['end']);
            $title = htmlspecialchars($_POST['title']);
            $fullday = htmlspecialchars($_POST['fullday']);
            $actived = htmlspecialchars($_POST['actived']);

            $stmt = $this->dbConnect()->prepare("UPDATE $this->table SET `dayID` = '$day' , `starteventat` = '$start' , `endeventat` = '$end' , `name` = '$title' ,  `isfullday` = '$fullday' , `actived` = '$actived' WHERE `id` = $id");
            $stmt->execute();

            //IF SUMITED
            $modified = 1;
        }

        if ($modified == 1) {
            header("location: /admin/calendrier/$id?success=1");
        }
    }


    function addEventCalendar()
    {

        if (!empty($_POST['day']) && !empty($_POST['start']) && !empty($_POST['end']) && !empty($_POST['title']) && !empty($_FILES['image']['name']) && !empty($_POST['fullday']) && !empty($_POST['actived'])) {

            $path = $_FILES['image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $newfilename = md5(uniqid(rand(), true)) . "." . $ext;
            move_uploaded_file($_FILES['image']['tmp_name'], "upload/img/$newfilename");
            $linkfile = "/upload/img/$newfilename";


            $day = htmlspecialchars($_POST['day']);
            $start = htmlspecialchars($_POST['start']);
            $end = htmlspecialchars($_POST['end']);
            $title = htmlspecialchars($_POST['title']);
            $image = $linkfile;
            $weeknumber = (new DateTime())->format("W");
            $fullday = htmlspecialchars($_POST['fullday']);
            $actived = htmlspecialchars($_POST['actived']);

            $stmt = $this->dbConnect()->prepare("INSERT INTO $this->table (`id`, `dayID`, `starteventat`, `endeventat`,  `name`, `image`, `week`, `isfullday`, `actived` ) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute(array($day, $start, $end, $title, $image, $weeknumber, $fullday, $actived));

            //IF SUMITED
            $modified = 1;
        } else {
            header("location: /admin/calendrier/add?error=1");
        }

        if ($modified == 1) {
            header("location: /admin/calendrier?add=1");
        }
    }
}
