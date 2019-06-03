<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 2019-06-02
 * Time: 20:06
 */
//Include Connection to the database
include_once ("DBConnection.php");

/**
 * Class testOutput
 * Created by: Created date: June 2nd 2019 Last Modified:June 3rd 2019
 * Used to teste if the code works with hard coded values of author and book
 */
class testOutput
{

    /**
     * @param $author
     * @param $book
     * Used to call other functions and get the variables $author and $book
     */
    public static function OutputData($author, $book)
    {
        echo $book;
        echo $author;
        $SelectBook=testOutput::SelectUser($author,$book);
        $SelectUser = testOutput::SelectUser($author);
        $SelectUser = testOutput::displayFeedback($book);
        $displaypayment=testOutput::displayPaymentHistory($author);
    }

    /**
     * @param $author
     * @param $book
     * Used to select a book
     */
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

    /**
     * @param $author
     * Used to select an user
     */
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

    /**
     * @param $book
     * Used to display feedback about that book
     */
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


    /**
     * @param $author
     * Used to display payments that the author has made
     */
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
//hard coded variables
$author="A1";
$book="Book1";
//Calls the class and method
$OutputData = testOutput::OutputData($author, $book);
