<?php
require_once('model/Manager.php');


class UserManager extends Manager
{

    private $_user,$_db;

    const PSEUDO_INCONNU = 1 ;
    const MOT_DE_PASSE_INCORRECT = 2 ;
    const USER_VERIFIED = 3;



    public function __construct()
    {
        $this->setDb($this->dbConnect());
    }

    //Getters

    //Setters
    private function setDb($db)
    {
        $this->_db = $db;
    }


    //verif de l'existance du logName et correspondance pwd
    public function verifLog($logName,$pwd)
    {
        $req = $this->_db->prepare('SELECT * FROM users WHERE logName = :logName');
        $req->execute(array('logName' => $logName));

        $existLog = $req->fetch();

        if($existLog == null)
        {
            return self::PSEUDO_INCONNU;
        }
        else
        {
            //On verifie la correspondance mdp avec le pass en db
            //$passHash = password_hash($pwd,PASSWORD_DEFAULT);
            $passHashBdd = $existLog['passHash'];

            if(!password_verify($pwd,$existLog['passHash']))
            {
                return self::MOT_DE_PASSE_INCORRECT;
            }
            else
            {
                //L'utilisateur est authentifier:

                //On Créait un User avec les données récupérées en db
                $user = new User($existLog);
                $_SESSION['user'] = $user;

                //On passe le status de la session à authentifié
                $_SESSION['authentified'] = true;

                return self::USER_VERIFIED;
            }

        }
    }







}

