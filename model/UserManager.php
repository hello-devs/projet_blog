<?php
require_once('model/Manager.php');


class UserManager extends Manager
{

    private $_user,$_db;


    public function __construct()
    {
        $this->setDb($this->dbConnect());
    }



    //Getters



    //Setters
    private function setDb($db)
    {
        $this->_db = $db
    }



}



/*
        $this->_user =(
            'id' => $user->id(),
            'name' => $user->name(),
            'passHash' $user->passHash()
        );
*/
