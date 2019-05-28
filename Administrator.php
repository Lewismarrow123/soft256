<?php
include_once ("DBConnection.php");
class Administrator
{

    public static function DisplayAdminTask($administrator)
    {
        //Output HTML
        echo"<title>EXERiverPublishing</title>";
        echo"<h1>Welcome to Exe Rive publishing $administrator</h1>";
        echo"<p>Click on task to run it</p>";
        echo"<hr>";

       echo"<a href='Addbook.html'>Add a book to the database</a>"."<br/>";
        echo"<a href='AddUser.html'>Add a user the database</a>"."<br/>";

    }
}
$administrator=$unamelogin;
