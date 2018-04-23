<?php
class User
{
    protected $_id,$_logName,$_passHash;

    //Construct and hydrate

    public function __construct(array $donnees)
    {
        $this->_hydrate($donnees);
    }

    protected function _hydrate(array $donnees)
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
        return $this->_id;
    }
    public function logName()
    {
        return $this->_logName;
    }
    public function passHash()
    {
        return $this->_passHash;
    }

    //Setters

    public function setId($id)
    {
        $this->_id = $id;
    }
    public function setLogName($logName)
    {
        $this->_logName = $logName;
    }
    public function setPassHash($passHash)
    {
        $this->_passHash = $passHash;
    }

}
