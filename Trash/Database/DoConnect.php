<?php

include_once ('DBConnect.php');

class DoConnect{

    private $hookup;

    public function __construct()
    {
        //Connects Client to Database
        $this->hookup=DBConnect::doConnect();
    }


}

$worker= new DoConnect();

