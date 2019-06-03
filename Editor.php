<?php
//Includes a connect to the database
include_once ("DBConnection.php");
/**
 * Created by: Lewis Marrow. On Date: 20th May 2019, Last Edited:3rd June 2019
 * Used to display books linked to the ediotr and display other tasks an editor can do
 * Class Editor
 */
class Editor
{

    public static function ViewBooks($editor)
    {

        //Output HTML
        echo "<title>EXERiverPublishing</title>";
        echo "<h1>Welcome to Exe Rive publishing $editor </h1>";
        echo "<p>Select a Book to Edit</p>";
        echo "<hr>";
        echo "<p>Book List</p>";

        //SQL to get book from Database
        global $conn;
        $sql = ("SELECT * FROM `Books` WHERE `Editor` = '$editor'");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Book = $row["Book"];
                echo "Book:$Book";
                //Add the option to add feedback to a book
                echo "<a href='AddFeedback.php'>Add Feedback</a>" . "<br/>";
            }
        }else{
            echo "You are currently assigned no books to review"."<br/>";
            echo "<a href='Login.html'>Log Out</a>" . "<br/>";
        }
        //Shows link's to other task's.
        echo "<a href='ShowFeedback.php'>View ALL Feedback</a>" . "<br/>";
        echo "<a href='AddMeetingNotes.php'>Record Meeting</a>" . "<br/>";
        echo "<a href='RequestPayment.php'>Advance progress and request a payment</a>" . "<br/>";
        echo "<a href='GetPayment.php'>See Payment history for a book</a>" . "<br/>";
    }
}
//Gets the editor value from the user class
$editor=$unamelogin;