<?php
include_once ('Database/DBConnect.php');
include_once ('AddBook.php');

$book=$_POST['title'];
echo $book;

/*class NewBook{
    public function __construct()
    {
        $this->tableMaster="proxyLog";
        $this->hookup=DBConnect::doConnect();
        $book=$this->hookup->real_escape_string(trim($_POST['title']))
        $author=$this->hookup->real_escape_string(trim($_POST['author']));
        $reviewer=$this->hookup->real_escape_string(trim($_POST['reviewer']));
        $date=$this->hookup->real_escape_string(trim($_POST['date']));
        $comment=$this->hookup->real_escape_string(trim($_POST['comment']));

        echo $book;
        echo $comment;
       /* $result=$this->Book->addBook($book, $author, $reviewer, $date, $comment);
       if($result=true) {
            echo "Book successfully added";
       }
        elseif($result=false){
            echo"Bye;";
        }}*/




//$worker= new NewBook();
