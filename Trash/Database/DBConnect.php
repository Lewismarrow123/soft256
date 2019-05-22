<?php

include_once ('DBInfo.php');

Abstract class DBConnect implements DBInfo{

    private static $server=DBConnect::HOST;
    private static $currentDB= DBConnect::DBNAME;
    private static $user= DBConnect::UNAME;
    private static $pass= DBConnect::PW;
    private static $hookup;

    public function doConnect()
    {
        self::$hookup=mysqli_connect(self::$server, self::$user, self::$pass, self::$currentDB);

        if(self::$hookup){

           //echo "successful connection to mysql";
        }
        elseif(mysqli_connect_error(self::$hookup)){
            echo ('Did not connect due to error:' . mysqli_connect_error());
        }
        return self::$hookup;
    }


}
