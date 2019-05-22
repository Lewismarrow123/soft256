<?php
include_once ("Database\DBConnect.php");
class Book{
    public function addBook($book, $author, $reviewer, $date, $comment)
    {
        $sql=("INSERT INTO 'Books' (`Book`, `Author`, `Reviewer`, `Data`, `Comments`) VALUES ('$book', '$author', '$reviewer', '$date','$comment')");
        if ($sql==1) {
            return true;
        } elseif ($sql==0) {
            echo"Your request cannot be processed at the moment";
            exit();
        }
    }
}
$worker = new Model();
