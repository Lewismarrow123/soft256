<?php
//Includes a connection to the database
include_once("DBConnection.php");
/**
 * Created by: Lewis Marrow. On Date: 20th May 2019, Last Edited:3rd June 2019
 * Used to add feedback from a book written by a reviewer or editor.
 * Class Editor
 */
Class Feedback{
    public static function SubmitFeedback($Fbook, $Freviewer, $comment, $rating,$date){
        echo "<title>EXERiverPublishing</title>";
        echo "<h1>Feedback Processing..</h1>";
        echo "<hr>";
        //Gets the variable $conn from the database file
        global $conn;
        //SQL query to select a book from the database
        $sql=("SELECT `BookID` FROM `Books` WHERE `Book` = '$Fbook'");
        $result = $conn->query($sql);
        //If the book does not exsit state there is an error on screen
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bookID = $row["BookID"];  
                echo "Book found in the database for book number:$bookID". "<br/>";
            }
            //if the book does exsit insert it into the database
           $insertFeedback=("INSERT INTO `Feedback`(`FeedbackID`,`Book`,`Reviewer`,`Comment`,`Rating`,`Date`) VALUES (NULL, '$Fbook', '$Freviewer', '$comment', '$rating',$date)");
           if ($conn->query($insertFeedback) === TRUE) {
            echo "Feedback Added Successfully";
            echo "<a href='ShowFeedback.php'>Go Back</a>" . "<br/>";
            } else {
            echo "Error:" . $insertFeedback . "<br>" . $conn->error;
            }
            //Close the database connection
            $conn->close();
        }
    
    }
}
//Get the variables from the Feedback form if a  user has cliecked submit and pass them to the form
if(isset($_POST['submit'])){
$Fbook=$_POST['books'];
global $Fbook;
$Freviewer=$_POST['reviewers'];
$comment=$_POST['comment'];
$rating=$_POST['rating'];
$date=$_POST['date'];
$worker = Feedback::SubmitFeedback($Fbook, $Freviewer, $comment, $rating,$date);
}
else{
//If no submit has been pressed and the user has arrived on this page by mistake redirect them back to the login page to authenticate
    header("Login.php");
}
