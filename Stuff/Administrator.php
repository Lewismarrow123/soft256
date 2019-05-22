<?php
include_once ("DBConnection.php");
class Administrator{

    private $fname;
    private $sname;
    private $email;
    private $username;
    private $password;
    /**
     * getForm constructor.
     * @param $f
     * @param $l
     * @param $e
     * @param $u
     * @param $p
     */
    public function __construct($f, $l, $e, $u, $p)
    {
        $this->fname = $f;
        echo "First name:", $f, "<br />";
        $this->sname =$l;
        echo "Last name:", $l, "<br />";
        $this->email =$e;
        echo "Email:", $e, "<br />";
        $this->username=$u;
        echo "Username:", $u, "<br />";
        $this->password=$p;
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getSname()
    {
        return $this->sname;
    }

    /**
     * @param mixed $sname
     */
    public function setSname($sname)
    {
        $this->sname = $sname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


    public static function CreateAdministrator($fnameform, $snameform, $emailform, $usernameform, $passwordform, $conn) {
        $author = new Administrator($fnameform, $snameform, $emailform, $usernameform, $passwordform);
        $author->saveToDatabase();
        return $author;
    }

    public function saveToDatabase(){
        global $conn;
        $getF=$this->getFname();
        $getL=$this->getSname();
        $getE=$this->getEmail();
        $getU=$this->getUsername();
        $getP=$this->getPassword();

        $sql=("INSERT INTO `Administrator` (`AdminID`, `Fname`, `Sname`, `Email`, `Username`, `Password`) VALUES (NULL, '$getF', '$getL', '$getE', '$getU', '$getP')");

        if ($conn->query($sql) === TRUE) {
            echo "Administrator Added Successfully";
        } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}

$fnameform = $_POST['fname'];
$snameform = $_POST['sname'];
$emailform= $_POST['email'];
$usernameform= $_POST['username'];
$passwordform=$_POST['password'];
$worker= Administrator::CreateAdministrator($fnameform, $snameform, $emailform, $usernameform, $passwordform, $conn);
