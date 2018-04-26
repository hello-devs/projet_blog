<?php
class User
{
    protected $id,$logName,$passHash;

    //Construct and hydrate

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    protected function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                  $this->$method($value);
            }
        }
    }




    //Getters

    public function id()
    {
        return $this->id;
    }
    public function logName()
    {
        return $this->logName;
    }
    public function passHash()
    {
        return $this->passHash;
    }

    //Setters

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setLogName($logName)
    {
        $this->logName = $logName;
    }
    public function setPassHash($passHash)
    {
        $this->passHash = $passHash;
    }

    /////////////////////////////////////
    public function __sleep()
    {
        return ['logName'];
    }

}
