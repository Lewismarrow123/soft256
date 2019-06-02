<?php
include_once ("DBConnection.php");
class Agent
{
    public static function displayAgentTask($agent)
    {
        //Output HTML
        echo "<title>EXERiverPublishing</title>";
        echo "<h1>Welcome to Exe Rive publishing $agent </h1>";
        echo"<hr>";
        echo "<a href='ShowFeedback.php'>View ALL Feedback</a>" . "<br/>";
        echo "<a href='GetPayment.php'>See Payment history for a book</a>" . "<br/>";

    }
}
$worker= new Agent();
//$agent=$unamelogin;