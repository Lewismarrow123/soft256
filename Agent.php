<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 2019-05-30
 * Time: 16:27
 */
//Provides a connection to the database
include_once ("DBConnection.php");

/**
 * Created by: Lewis Marrow. On Date: 20th May 2019, Last Edited:3rd June 2019
 * Used to display the task's and roles the agent can do and it is used to delete users from the database.
 * Class Agent
 */
class Agent
{
    //Displays the roles and task's a agent can do
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
//Calls the class agent
$worker= new Agent();
//Uses the variable from the class User
$agent=$unamelogin;