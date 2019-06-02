<?php
include_once ("DBConnection.php");
Class ShowFeedback{

    public static function ViewFeedback(){

        //Output HTML
        echo "<title>EXERiverPublishing</title>";
        echo "<h1>View Feedback </h1>";
        echo "<hr>";
        //Select Feedback From Database
        global $conn;
        $selectAllFeedback=("SELECT * FROM `Feedback`");
        $result = $conn->query($selectAllFeedback);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Book: " .$row["Book"]. " Reviewer: " . $row["Reviewer"]. " Feedback:". $row["Comment"]. " Rating:".$row["Rating"]." Date:".$row["Date"]."<br>";
            }
        }
        echo "<a href='Login.html'>Log Out</a>" . "<br/>";
    }
}
$worker = ShowFeedback::ViewFeedback();

