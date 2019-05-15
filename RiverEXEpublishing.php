<?php
class Publication{

    private $author;
    private $reviewer;
    private $feedback;
    private $administrator;
    private $publication;

    /**
     * Publication constructor.
     * @param $author
     * @param $reviewer
     * @param $feedback
     * @param $administrator
     * @param $publication
     */
    public function __construct($author, $reviewer, $feedback, $administrator, $publication)
    {
        $this->author = $author;
        $this->reviewer = $reviewer;
        $this->feedback = $feedback;
        $this->administrator = $administrator;
        $this->publication = $publication;

        $author= "Lewis";
        $reviewer="Jane";
        $feedback="This is fantastic";
        $administrator= array("Admin", "ADMIN");
        $publication=array("How to write OOP", $author ,$reviewer ,$feedback);
        echo"Title:".$publication[0]. "<br/>Author:".$publication[1]."<br/>Reviewer:".$publication[2]."<br/>Feedback:".$publication[3];
    }
}

$author="";
$reviewer="";
$feedback="";
$administrator="";
$publication="";

$worker = new Publication($author,$reviewer,$feedback,$administrator,$publication);

