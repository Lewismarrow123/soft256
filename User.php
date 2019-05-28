<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 2019-05-22
 * Time: 17:14
 */
include_once ("DBConnection.php");
include_once ("Author.php");
include_once ("Reviewer.php");
include_once ("Administrator.php");
class User{

    private $fname;
    private $sname;
    private $email;
    private $username;
    private $password;
    private $userrole;

    /**
     * getForm constructor.
     * @param $f
     * @param $l
     * @param $e
     * @param $u
     * @param $p
     * @param $ur
     */
    public function __construct($f, $l, $e, $u, $p, $ur)
    {
        $this->fname = $f;
        echo "First name:", $f, "<br />";
        $this->sname =$l;
        echo "Last name:", $l, "<br />";
        $this->email =$e;
        echo "Email", $e, "<br />";
        $this->username=$u;
        echo "Username:", $u, "<br />";
        $this->password=$p;
        $this->userrole=$ur;
        echo "UserRole:",$ur, "<br />";
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

    /**
     * @return mixed
     */
    public function getUserrole()
    {
        return $this->userrole;
    }

    /**
     * @param mixed $userrole
     */
    public function setUserrole($userrole)
    {
        $this->userrole = $userrole;
    }

    public static function CreateUser($fnameform, $snameform, $emailform, $usernameform, $passwordform, $userrole, $conn) {
        $author = new User($fnameform, $snameform, $emailform, $usernameform, $passwordform, $userrole);
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
        $getUR=$this->getUserrole();

        $sql=("INSERT INTO `Users` (`UserID`, `Fname`, `Sname`, `Email`, `Username`, `Password`, `Userrole`) VALUES (NULL, '$getF', '$getL', '$getE', '$getU', '$getP', '$getUR')");

        if ($conn->query($sql) === TRUE) {
            echo "User Added Successfully";
        } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}

if (isset($_POST['submit'])) {
    $fnameform = $_POST['fname'];
    $snameform = $_POST['sname'];
    $emailform = $_POST['email'];
    $usernameform = $_POST['username'];
    $passwordform = $_POST['password'];
    $userole = $_POST['userrole'];

        if($fnameform==NULL && $snameform==NULL && $emailform==NULL && $usernameform==NULL && $passwordform=NULL && $userole==NULL){
            header("Location:AddUser.html");
        }
    $worker = User::CreateUser($fnameform, $snameform, $emailform, $usernameform, $passwordform, $userole, $conn);
}
else{
    $unamelogin=$_POST['uname'];
    $pwlogin =$_POST['pw'];

    if($unamelogin==NULL && $pwlogin==NULL)
    {
        header("Location:login.html");
    }
        $sql=("SELECT * FROM `Users` WHERE `Username` = '$unamelogin' && `Password` = '$pwlogin'");
        $result=$conn->query($sql);

        if($result->num_rows>0) {
            $sql2=("SELECT `UserRole` FROM `USERS` WHERE `Username` ='$unamelogin'");
            $result2=$conn->query($sql2);

            if($result2->num_rows>0){
                while($row = $result->fetch_assoc()) {
                    $role=$row["UserRole"];

                }
                If($role=="author"){
                    echo"Hello Author ".$unamelogin."<br/>";
                    $worker = Author::ViewBooks($unamelogin);
                    echo"<br/>";
                }
                elseif($role=="administrator"){
                    echo"Hello Administrator ";
                    $displaytask = Administrator::DisplayAdminTask($unamelogin);
                }
                elseif($role=="editor"){
                    echo"Hello Editor ".$unamelogin;
                }
                elseif($role=="agent"){
                    echo"Hello Agent ".$unamelogin;
                }
                elseif($role=="reviewer"){
                    echo "Hello Reviewer".$unamelogin;
                    $worker= Reviewer::ViewBooks($unamelogin);
                }
                elseif($role==NULL){
                   header("Location:login.html");
            }
            else{
                header("Location:login.html");
            }
        } else {
            header("Location:login.html");
        }

        $conn->close();
        }
}

