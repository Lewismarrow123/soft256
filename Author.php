<?php
include_once ("DBConnection.php");
class Author
{

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
                echo"<a href='ShowFeedback.php'>View Feedback</a>"."<br/>";
                //$worker= new ViewFeedback();
            }
        }
        elseif($result->num_rows < 0){
        echo"You currently have no books in the system. Please ask an administrator to add them". "<br/>";
        echo "<a href='Login.html'>Log Out</a>" . "<br/>";
    }
    echo"<a href='Addbook.html'>Add a book to the database</a>"."<br/>";
    echo "<a href='GetPayment.php'>See Payment history for a book</a>" . "<br/>";
    }
}
$author=$unamelogin;

