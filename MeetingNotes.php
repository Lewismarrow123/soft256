<?php
//Includes a connection to the database
include_once("DBConnection.php");

/**
 * Class MeetingNotes
 * Date created: Thursday 30th May 2019. Created By:Lewis Marrow. For Application:Soft256
 *This class allows users to add meeting notes to a book in the publication fir river exe publishing
 */
Class MeetingNotes{
    /**
     * @param $meetingNF
     * @param $authorF
     * @param $mentorF
     * @param $transcriptF
     * @param $dateF
     */
    public static function SubmitMeeting($meetingNF, $authorF, $mentorF, $transcriptF, $dateF){
        echo "<title>EXERiverPublishing</title>";
        echo "<h1>Transcript Processing</h1>";
        echo "<hr>";
        //Gets the variable $conn from the page include DBConnection
        global $conn;
        //Gets SQL Query to insert the data to the database and then runs the query agaianst the database
        $insertMeeting=("INSERT INTO `MeetingNotes` (`MeetingID`, `Name`, `Author`, `Mentor`, `Transcript`, `Date`) VALUES (NULL, '$meetingNF', '$authorF', '$mentorF', '$transcriptF', '$dateF')");
            if ($conn->query($insertMeeting) === TRUE) {
                echo "Meeting Added Successfully";
                echo "<a href='ShowFeedback.php'>Go Back</a>" . "<br/>";
            } else {
                echo "Error:" . $insertMeeting . "<br>" . $conn->error;
            }
            //Closes the database connection
            $conn->close();
        }
}
//Gets the input from the form and passes it to the class MeetingNotes and the method SubmitMeeting
if(isset($_POST['submit'])){
    $meetingNF=['meetingname'];
    $authorF=['author'];
    $mentorF=['mentor'];
    $transcriptF=['transcript'];
    $dateF=['date'];
    $worker= MeetingNotes::SubmitMeeting($meetingNF, $authorF, $mentorF, $transcriptF, $dateF);
}
else{
    //If no submit has been pressed and the user has arrived on this page by mistake redirect them back to the login page to authenticate
    header("Login.php");
}
