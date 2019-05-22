<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 2019-05-15
 * Time: 20:06
 */
include_once ("Database/DBConnect.php");
include_once ("Database/DoConnect.php");
//include_once ("RegistrationProcess.php");

class RegDB extends DBConnect
{
    private $query;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_signUp($query){
        $result=$this->hookup->query($query);

        if($result==true){
            return true;
        }
        elseif($result==false){
            return false;
        }

    }

}
$callFunction = new RegDB();