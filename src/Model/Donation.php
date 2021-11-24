<?php

namespace Src\Model;

use Src\Entity\EntityDonation;

class Donation extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityDonation();
        $this->table = 'modul_donation';
    }

    /**
     * Edit donation page on database
     * @return void 
     */
    function editDonationPage()
    {

        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['paypal']) && !empty($_POST['streamlab']) && !empty($_POST['actived'])) {
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $paypal = htmlspecialchars($_POST['paypal']);
            $streamlab = htmlspecialchars($_POST['streamlab']);
            $actived = htmlspecialchars($_POST['actived']);

            $stmt = $this->dbConnect()->prepare("UPDATE $this->table SET title=? , content=? , linkdonationpaypal=? , linkdonationstreamlab=? , actived=? WHERE id=1");
            $stmt->execute(array($title, $content, $paypal, $streamlab, $actived));

            //IF SUMITED
            $modified = 1;
        } else {
            header("location: /admin/donation?error=1");
        }

        if ($modified == 1) {
            header("location:  /admin/donation?success=1");
        }
    }
}
