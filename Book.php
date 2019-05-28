<?php
include_once ("DBConnection.php");
class Book{

    private $title;
    private $author;
    private $reviewer1;
    private $reviewer2;
    private $date;
    private $comment;
    /**
     * getForm constructor.
     * @param $t
     * @param $a
     * @param $r1
     * @param $r2
     * @param $d
     * @param $c
     */
    public function __construct($t, $a, $r1, $r2, $d, $c)
    {
        $this->title = $t;
        echo "Book Name:", $t, "<br />";
        $this->author =$a;
        echo "Author:", $a, "<br />";
        $this->reviewer1 =$r1;
        echo "Reviewer:", $r1, "<br />";
        $this->reviewer2 =$r2;
        echo "Reviewer:", $r2, "<br />";
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
    public function getReviewer1()
    {
        return $this->reviewer1;
    }

    /**
     * @param mixed $reviewer
     */
    public function setReviewer1($reviewer1)
    {
        $this->reviewer1 = $reviewer1;
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

    /**
     * @return mixed
     */
    public function getReviewer2()
    {
        return $this->reviewer2;
    }

    /**
     * @param mixed $reviewer2
     */
    public function setReviewer2($reviewer2)
    {
        $this->reviewer2 = $reviewer2;
    }




    public static function CreateBook($titleform, $authorform, $reviewerform1, $reviewerform2, $dateform, $commentform) {
        $book = new Book($titleform, $authorform, $reviewerform1, $reviewerform2, $dateform, $commentform);
       $book->saveToDatabase();
       return $book;
    }

    public function saveToDatabase(){
        global $conn;
        $getT=$this->getTitle();
        $getA=$this->getAuthor();
        $getR1=$this->getReviewer1();
        $getR2=$this->getReviewer2();
        $getD=$this->getDate();
        $getC=$this->getComment();

        $sql=("INSERT INTO `Books` (`BookID`, `Book`, `Author`, `Reviewer1`, `Reviewer2`, `Data`, `Comments`) VALUES (NULL, '$getT', '$getA', '$getR1', '$getR2', '$getD', '$getC')");

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
$reviewerform1= $_POST['reviewer1'];
$reviewerform2= $_POST['reviewer2'];
$dateform= $_POST['date'];
$commentform=$_POST['comments'];
$worker= Book::CreateBook($titleform, $authorform, $reviewerform1, $reviewerform2, $dateform, $commentform, $conn);






