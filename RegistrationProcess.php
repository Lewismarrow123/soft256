<?php

include_once ('Database/DBConnect.php');
include_once ("RegDB.php");

class RegNewUser{

    public function __construct()
    {

        $this->tableMaster = "proxyLog";
        $this->hookup = DBConnect::doConnect();
        $username = $this->hookup->real_escape_string(trim($_POST['uname']));
        $pwNow = $this->hookup->real_escape_string(trim($_POST['pw']));
        $fnameNow = $this->hookup->real_escape_string(trim($_POST['fname']));
        $snameNow = $this->hookup->real_escape_string(trim($_POST['sname']));
        $emailNow = $this->hookup->real_escape_string(trim($_POST['email']));
        $cemailNow = $this->hookup->real_escape_string(trim($_POST['cemail']));
        $telenow = $this->hookup->real_escape_string(trim($_POST['tele']));
        $addressnow = $this->hookup->real_escape_string(trim($_POST['address']));
        $postcodenow = $this->hookup->real_escape_string(trim($_POST['postcode']));
        $access = $this->hookup->real_escape_string(trim($_POST['type']));
        //insertIntoDatabase($username,$pwNow,$fnameNow,$snameNow,$emailNow,$telenow,$addressnow,$postcodenow,$access);
        echo"Data Received";
        $result =$regDB->get_signUp( "INSERT INTO $this->tableMaster (uname,pw,fname,sname,email,cemail,tele,postcode,access) VALUES ('$username' , md5('$pwNow') , '$fnameNow' ,'$snameNow', '$emailNow', '$telenow' , '$addressnow', '$postcodenow', ' $access' )");
        if ($result==1) {

            echo "Registration completed";
        } elseif ($result==0) {
            echo"Your request cannot be processed at the moment";
            //printf("Invalid query: %s <br /> Whole query: %s <br /> $this->hookup->error ,$result");

            exit();
        }
        $this->hookup->close();

    }
}
$worker= new RegNewUser();



