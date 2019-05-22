<?php
include_once ("DBConnection.php");
class Book{

    private $title;
    private $author;
    private $reviewer;
    private $date;
    private $comment;
    /**
     * getForm constructor.
     * @param $t
     * @param $a
     * @param $r
     * @param $d
     * @param $c
     */
    public function __construct($t, $a, $r, $d, $c)
    {
        $this->title = $t;
        echo "Book Name:", $t, "<br />";
        $this->author =$a;
        echo "Author:", $a, "<br />";
        $this->reviewer =$r;
        echo "Reviewer:", $r, "<br />";
        $this->date=$d;
        echo "Date:", $d, "<br />";
        $this->comment =$c;
        echo "Comment:", $c , "<br />";
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getReviewer()
    {
        return $this->reviewer;
    }

    /**
     * @param mixed $reviewer
     */
    public function setReviewer($reviewer)
    {
        $this->reviewer = $reviewer;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }



    public static function CreateBook($titleform, $authorform, $reviewerform, $dateform, $commentform) {
        $book = new Book($titleform, $authorform, $reviewerform, $dateform, $commentform);
       $book->saveToDatabase();
       return $book;
    }

    public function saveToDatabase(){
        global $conn;
        $getT=$this->getTitle();
        $getA=$this->getAuthor();
        $getR=$this->getReviewer();
        $getD=$this->getDate();
        $getC=$this->getComment();

        $sql=("INSERT INTO `Books` (`BookID`, `Book`, `Author`, `Reviewer`, `Data`, `Comments`) VALUES (NULL, '$getT', '$getA', '$getR', '$getD', '$getC')");

        if ($conn->query($sql) === TRUE) {
            echo "Book Added Successfully";
        } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}

$titleform = $_POST['title'];
$authorform = $_POST['author'];
$reviewerform= $_POST['reviewer'];
$dateform= $_POST['date'];
$commentform=$_POST['comments'];
$worker= Book::CreateBook($titleform, $authorform, $reviewerform, $dateform, $commentform, $conn);






