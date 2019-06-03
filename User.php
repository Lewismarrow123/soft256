<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 2019-05-22
 * Time: 17:14
 */
//include links to external files
include_once ("DBConnection.php");
include_once ("Author.php");
include_once ("Reviewer.php");
include_once ("Administrator.php");
include_once ("Agent.php");
include_once ("Editor.php");
/**
 * Class User
 * Created by: Lewis Marrow. On Date: 22th May 2019, Last Edited:3rd June 2019
 * Used to create users and control actions taken by classes which inherit from this class
 */
class User{

    /**
     * @var
     */
    private $fname;
    /**
     * @var
     */
    private $sname;
    /**
     * @var
     */
    private $email;
    /**
     * @var
     */
    private $username;
    /**
     * @var
     */
    private $password;
    /**
     * @var
     */
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

    /**
     * @param $fnameform
     * @param $snameform
     * @param $emailform
     * @param $usernameform
     * @param $passwordform
     * @param $userrole
     * @param $conn
     * @return User
     * Calls a new instance of get user and construct values and then outputs a users and inserts in to the database
     */
    public static function CreateUser($fnameform, $snameform, $emailform, $usernameform, $passwordform, $userrole, $conn) {
        $author = new User($fnameform, $snameform, $emailform, $usernameform, $passwordform, $userrole);
        $author->saveToDatabase();
        return $author;
    }

    /**
     * Gets variables from the user form and inserts them into the database
     *Saves the new user in the database
     */
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
        //Closes the datbase connection
        $conn->close();
    }
}
//Gets data from the add user form
if (isset($_POST['submit'])) {
    $fnameform = $_POST['fname'];
    $snameform = $_POST['sname'];
    $emailform = $_POST['email'];
    $usernameform = $_POST['username'];
    $passwordform = $_POST['password'];
    $userole = $_POST['userrole'];
        //Checks feields are not null, if they are redirect
        if($fnameform==NULL && $snameform==NULL && $emailform==NULL && $usernameform==NULL && $passwordform==NULL && $userole==NULL){
            header("Location:AddUser.html");
        }//Calls the new user method
    $worker = User::CreateUser($fnameform, $snameform, $emailform, $usernameform, $passwordform, $userole, $conn);
}
else{
    //If the entry is not from the signup form it is from the login and then gets the variables
    $unamelogin=$_POST['uname'];
    $pwlogin =$_POST['pw'];
    //Checks to make sure tey are not null, redirect if they are
    if($unamelogin==NULL && $pwlogin==NULL)
    {
        header("Location:login.html");
    }
        //Authenicates them by checking the login from the database
        $sql=("SELECT * FROM `Users` WHERE `Username` = '$unamelogin' && `Password` = '$pwlogin'");
        $result=$conn->query($sql);
        // A second query is then completed to check if there user role
        if($result->num_rows>0) {
            $sql2=("SELECT `UserRole` FROM `Users` WHERE `Username` ='$unamelogin'");
            $result2=$conn->query($sql2);

            if($result2->num_rows>0){
                while($row = $result->fetch_assoc()) {
                    $role=$row["UserRole"];

                }
                //Depending on what user role is received depends on what page the data get passed to next class and method. This is shown below
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
                    $worker= Editor::ViewBooks($unamelogin);
                }
                elseif($role=="agent"){
                    echo"Hello Agent ".$unamelogin;
                    $worker = Agent::displayAgentTask($unamelogin);
                }
                elseif($role=="reviewer"){
                    echo "Hello Reviewer".$unamelogin;
                    $worker= Reviewer::ViewBooks($unamelogin);
                }
                elseif($role==NULL){
                    //if no role then redirect
                   header("Location:login.html");
            }
            else{
                //if not in the database redirecr
                header("Location:login.html");
            }
        } else {
                //If did not submit the form redirect
            header("Location:login.html");
        }
        //Close connection to the database
        $conn->close();
        }
}

