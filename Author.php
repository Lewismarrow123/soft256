<?php
//Provides a connection to the database
include_once ("DBConnection.php");
/**
 * Created by: Lewis Marrow. On Date: 20th May 2019, Last Edited:3rd June 2019
 * Used to display the task's and roles the author can do and it displays books in the system that are associated to that user.
 * Class Author
 */
class Author
{
    //Class to display a list of books in the database which are written  y the selected author.
    public static function ViewBooks($author)
    {

     //Output HTML
     echo"<title>EXERiverPublishing</title>";
     echo"<h1>Welcome to Exe Rive publishing $author </h1>";
     echo"<p>View your Books and Feedback</p>";
     echo"<hr>";
     echo"<p>Book List</p>";

        //SQL to get book from Database
        global $conn;
        $sql = ("SELECT * FROM `Books` WHERE `Author` = '$author'");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                $Book = $row["Book"];
                echo "Book:$Book";
                //Gives the user an option to add feedback to the specified book
                echo"<a href='ShowFeedback.php'>View Feedback</a>"."<br/>";
            }
        }
        elseif($result->num_rows < 0){
        //Error message if SQL Fails
        echo"You currently have no books in the system. Please ask an administrator to add them". "<br/>";
        echo "<a href='Login.html'>Log Out</a>" . "<br/>";
    }
    //Display's other tasks that the author user can do
    echo"<a href='Addbook.html'>Add a book to the database</a>"."<br/>";
    echo "<a href='GetPayment.php'>See Payment history for a book</a>" . "<br/>";
    }
}
//Uses the user class from user page
$author=$unamelogin;

