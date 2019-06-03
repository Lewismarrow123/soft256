<?php
//Include a link to the database
include_once ("DBConnection.php");

/**
 * Class Reviewer
 * Created by: Lewis Marrow. On Date: 20th May 2019, Last Edited:3rd June 2019
 * Used to display the task's and roles the editor can do and it is to display books that have been assigned to a user.
 */
class Reviewer
{

    /**
     * @param $reviewer
     */
    public static function ViewBooks($reviewer)
    {

        //Output HTML
        echo "<title>EXERiverPublishing</title>";
        echo "<h1>Welcome to Exe Rive publishing $reviewer </h1>";
        echo "<p>View your Books and Feedback</p>";
        echo "<hr>";
        echo "<p>Book List</p>";

        //SQL to get book from Database
        global $conn;
        $sql = ("SELECT * FROM `Books` WHERE `Reviewer1` = '$reviewer' OR `Reviewer2` = '$reviewer'");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Book = $row["Book"];
                echo "Book:$Book";
                echo "<a href='AddFeedback.php'>Add Feedback</a>" . "<br/>";
            }
        }else{
            echo "You are currently assigned no books to review"."<br/>";
            echo "<a href='Login.html'>Log Out</a>" . "<br/>";
        }
        //Displays other options for the reviewer to carry out
        echo "<a href='ShowFeedback.php'>View ALL Feedback</a>" . "<br/>";
        echo "<a href='AddMeetingNotes.php.php'>Record Meeting</a>" . "<br/>";
        echo "<a href='RequestPayment.php'>Advance progress and request a payment</a>" . "<br/>";

    }
}
//Gets the username from the User class
$reviewer=$unamelogin;
