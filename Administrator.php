<?php
//Provides a connection to the database
include_once ("DBConnection.php");

/**
 * Class Administrator
 * Created by: Lewis Marrow. On Date: 20th May 2019, Last Edited:3rd June 2019
 * Used to display the task's and roles the administrator can do and it is used to delete users from the database.
 *
 */
class Administrator
{
    //This class is called from the User class when an Administrator Log's in
    public static function DisplayAdminTask($administrator)
    {
        //Output HTML to the webpage
        echo"<title>EXERiverPublishing</title>";
        echo"<h1>Welcome to Exe Rive publishing $administrator</h1>";
        echo"<p>Click on task to run it</p>";
        echo"<hr>";
        //Display user task's
        echo"<a href='Addbook.html'>Add a book to the database</a>"."<br/>";
        echo"<a href='AddUser.html'>Add a user the database</a>"."<br/>";
        echo "<a href='DeleteUser.php.php'>Delete a User from the database</a>" . "<br/>";
        echo "<a href='GetPayment.php'>See Payment history for a book</a>" . "<br/>";
        echo "<a href='ApprovePayment.php'>Approve a payment for an author</a>" . "<br/>";


    }

    //When the delete a user for is selected this section is called and delete's the requested user from the database.
    //This then prints a message to screen to let the user know that the user has been deleted.
    public static function DeleteUser($username){
        global $conn;
        $sql = ("DELETE FROM `Users` WHERE `Username`= '$username'");

        if ($conn->query($sql) === TRUE) {
            echo "User deleted successfully";
            echo "<a href='Login.html'>Go back</a>" . "<br/>";
        } else {
            echo"Seek administrator support";
            echo "Error deleting User: " . $conn->error;
        }

        $conn->close();
    }
}
//Get's user input from the form and process's it if it has been submitted
if(isset($_POST['Delete'])){
    $username=$_POST['Users'];
    $worker=Administrator::DeleteUser($username);
}
//Get the username and passes to the display admin task's function so that it can be used in the function.
$administrator = $unamelogin;


