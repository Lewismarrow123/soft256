<?php
include_once("DBConnection.php");
Class MeetingNotes{
    public static function SubmitMeeting($meetingNF, $authorF, $mentorF, $transcriptF, $dateF){
        echo "<title>EXERiverPublishing</title>";
        echo "<h1>Transcript Processing</h1>";
        echo "<hr>";
        global $conn;
        $insertMeeting=("INSERT INTO `MeetingNotes` (`MeetingID`, `Name`, `Author`, `Mentor`, `Transcript`, `Date`) VALUES (NULL, '$meetingNF', '$authorF', '$mentorF', '$transcriptF', '$dateF')");
            if ($conn->query($insertMeeting) === TRUE) {
                echo "Meeting Added Successfully";
                echo "<a href='ShowFeedback.php'>Go Back</a>" . "<br/>";
            } else {
                echo "Error:" . $insertMeeting . "<br>" . $conn->error;
            }
            $conn->close();
        }
}
if(isset($_POST['submit'])){
    $meetingNF=['meetingname'];
    $authorF=['author'];
    $mentorF=['mentor'];
    $transcriptF=['transcript'];
    $dateF=['date'];
    $worker= MeetingNotes::SubmitMeeting($meetingNF, $authorF, $mentorF, $transcriptF, $dateF);
}
else{
    header("Login.php");
}
