<?php
include_once ("DBConnection.php");
class Reviewer
{

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
        $sql = ("SELECT * FROM `Books` WHERE `Reviewer1` = '$reviewer'");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Book = $row["Book"];
                echo "Book:$Book" . "<br/>";
                echo "<a href='AddFeedback.php'>Add Feedback</a>";
            }
        } elseif ($result->num_rows < 0) {
            echo "No results in column Reviewer1";
            $try2 = ("SELECT * FROM `Books` WHERE `Reviewer2` = '$reviewer'");
            $result2 = $conn->query($try2);
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    $Book = $row["Book"];
                    echo "Book:$Book" . "<br/>";
                    echo "<a href='AddFeedback.php'>Add Feedback</a>";
                }
            }
            elseif ($result->num_rows< 0){
                echo"You are currently assigned no books to review";
            }
        }
    }
}
$reviewer=$unamelogin;