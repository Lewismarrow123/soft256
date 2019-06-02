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
        echo "<a href='DeleteUser.php.php'>Delete a User from the database</a>" . "<br/>";
        echo "<a href='GetPayment.php'>See Payment history for a book</a>" . "<br/>";
        echo "<a href='ApprovePayment.php'>Approve a payment for an author</a>" . "<br/>";


    }

    public static function DeleteUser($username){
        global $conn;
        $sql = ("DELETE FROM `Users` WHERE `Username`= '$username'");

        if ($conn->query($sql) === TRUE) {
            echo "User deleted successfully";
        } else {
            echo "Error deleting User: " . $conn->error;
        }

        $conn->close();
    }
}
if(isset($_POST['Delete'])){
    $username=$_POST['Users'];
    $worker=Administrator::DeleteUser($username);
}
$administrator = $unamelogin;


