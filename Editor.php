<?php
include_once ("DBConnection.php");
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
                echo "<a href='AddFeedback.php'>Add Feedback</a>" . "<br/>";
            }
        }else{
            echo "You are currently assigned no books to review"."<br/>";
            echo "<a href='Login.html'>Log Out</a>" . "<br/>";
        }
        echo "<a href='ShowFeedback.php'>View ALL Feedback</a>" . "<br/>";
        echo "<a href='AddMeetingNotes.php'>Record Meeting</a>" . "<br/>";
        echo "<a href='RequestPayment.php'>Advance progress and request a payment</a>" . "<br/>";
        echo "<a href='GetPayment.php'>See Payment history for a book</a>" . "<br/>";
    }
}
$editor=$unamelogin;