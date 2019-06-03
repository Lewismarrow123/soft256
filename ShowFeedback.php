<?php
//Includes a link to the database
include_once ("DBConnection.php");

/**
 * Class ShowFeedback
 *Created by: Lewis Marrow. On Date: 20th May 2019, Last Edited:3rd June 2019
 * Used to show feedback that has been received from the form feedback and Shown to the webpage
 */
Class ShowFeedback{

    public static function ViewFeedback(){

        //Output HTML
        echo "<title>EXERiverPublishing</title>";
        echo "<h1>View Feedback </h1>";
        echo "<hr>";
        //Select Feedback From Database
        //Uses the variable $conn from the the include file
        global $conn;
        $selectAllFeedback=("SELECT * FROM `Feedback`");
        $result = $conn->query($selectAllFeedback);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Book: " .$row["Book"]. " Reviewer: " . $row["Reviewer"]. " Feedback:". $row["Comment"]. " Rating:".$row["Rating"]." Date:".$row["Date"]."<br>";
            }
        }
        //Gives the user the option to log out
        echo "<a href='Login.html'>Log Out</a>" . "<br/>";
    }
}
//Runs the class ShowFeedback and the method ViewFeedback
$worker = ShowFeedback::ViewFeedback();

