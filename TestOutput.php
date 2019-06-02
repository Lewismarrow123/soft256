<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 2019-06-02
 * Time: 20:06
 */
include_once ("DBConnection.php");
class testOutput
{

    public static function OutputData($author, $book)
    {
        echo $book;
        echo $author;
        $SelectBook=testOutput::SelectUser($author,$book);
        $SelectUser = testOutput::SelectUser($author);
        $SelectUser = testOutput::displayFeedback($book);
        $displaypayment=testOutput::displayPaymentHistory($author);
    }

    private static function SelectBook($author, $book)
    {
        global $conn;
        $sql = ("SELECT * FROM `Books` WHERE `Author` = '$author' && `Book` = '$book'");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                "This Book Exists in the Database";
            }
        } else {
            echo "error 1";
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }

    private static function SelectUser($author)
    {
        global $conn;
        $sql = ("SELECT * FROM `Users` WHERE `Username` = '$author'");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                "User Exists in the database";
            }
        } else {
            echo "error 2";
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }

    private static function displayFeedback($book)
    {
        global $conn;
        $sql = ("SELECT * FROM `Feedback` WHERE `Book` = '$book'");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Book: " . $row["Book"] . " Reviewer: " . $row["Reviewer"] . " Feedback:" . $row["Comment"] . " Rating:" . $row["Rating"] . " Date:" . $row["Date"] . "<br>";
            }

        } else {
            echo "error 3";
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }


    private static function displayPaymentHistory($author)
    {
        global $conn;
        $sql = ("SELECT * FROM `Payment` WHERE `Author` = '$author'");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Book " . $row["Book"] . " Author " . $row["Author"] . "Amount" . $row["Amount"] . "Status" . $row["Status"] . "<br>";
            }
        }
        else {
            echo "error 4";
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }
}
$author="A1";
$book="Book1";
$OutputData = testOutput::OutputData($author, $book);
