<?php
include_once("DBConnection.php");
Class Feedback{
    public static function SubmitFeedback($Fbook, $Freviewer, $comment, $rating,$date){
        echo "<title>EXERiverPublishing</title>";
        echo "<h1>Feedback Processing..</h1>";
        echo "<hr>";
        global $conn;
        //echo"$Fbook, $comment, $rating,Success";
        $sql=("SELECT `BookID` FROM `Books` WHERE `Book` = '$Fbook'");
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bookID = $row["BookID"];  
                echo "Book found in the databse for book number:$bookID". "<br/>";
            } 
           $insertFeedback=("INSERT INTO `Feedback`(`FeedbackID`,`Book`,`Reviewer`,`Comment`,`Rating`,`Date`) VALUES (NULL, '$Fbook', '$Freviewer', '$comment', '$rating',$date)");
           if ($conn->query($insertFeedback) === TRUE) {
            echo "Feedback Added Successfully";
            echo "<a href='ShowFeedback.php'>Go Back</a>" . "<br/>";
            } else {
            echo "Error:" . $insertFeedback . "<br>" . $conn->error;
            }
            $conn->close();
        }
    
    }
}
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
    header("Login.php");
}
