<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 2019-05-30
 * Time: 16:27
 */
//Includes the link to the database connection
include_once ("DBConnection.php");

/**
 * Class Payment
 * Used to authenicate, approve, request and process payments for RiverEXEPublishing
 */
Class Payment{

    /**
     * @param $books
     * @param $author
     * @param $amount
     */
    public static function ProcessPayment($books, $author, $amount){
        $status="Paid";
        //Gets the variable global from the include link
        global $conn;
        //SQL Query to insert the payment into the database
        $insertPayment=("INSERT INTO `Payment` (`PaymentID`, `Book`, `Author`, `Amount`, `Status`) VALUES (NULL, '$books', '$author', '$amount', '$status')");
        if ($conn->query($insertPayment) === TRUE) {
            echo "Payment Proccessed Successfully";
            echo "<a href='GetPayment.php'>SeePayments</a>" . "<br/>";
            echo "<a href='Login.html'>Go Back</a>" . "<br/>";
        } else {
           echo "Payment Failed! Please see an administrator";
            echo "Error:" . $insertPayment . "<br>" . $conn->error;
        }
        //Closes connection to the database
        $conn->close();
        }

    /**
     * @param $books
     * @param $author
     * @param $amount
     */
    public static function RequestPayment($books, $author, $amount){
        $status="Pending";
        //Gets the variable global from the include link
        global $conn;
        //SQL Query to insert the payment request into the database
        $requestpayment=("INSERT INTO `Payment` (`PaymentID`, `Book`, `Author`, `Amount`, `Status`) VALUES (NULL, '$books', '$author', '$amount', '$status')");
        if ($conn->query($requestpayment) === TRUE) {
            echo "Payment Requested Successfully";
            echo "<a href='Login.html'>Go Back</a>" . "<br/>";
        } else {
            echo "Payment Request Failed! Please see an administrator";
            echo "Error:" . $requestpayment . "<br>" . $conn->error;
        }
        //Closes connection to the database
        $conn->close();
        }

    /**
     * @param $newbook
     */
    public static function GetPayment($newbook){
        //Gets the variable global from the include link
        global $conn;
        //SQL Query to show the payment advances for a book in the database
        $getPayment=("SELECT * FROM `Payment` WHERE `Book` = '$newbook'");
        $result=$conn->query($getPayment);
        if($result->num_rows>0) {
            while ($row = $result->fetch_assoc()) {
                echo "Book " . $row["Book"] . " Author " . $row["Author"] . "Amount" . $row["Amount"] . "Status" . $row["Status"] . "<br>";
            }
        }
        else{
            echo"ERROR 500. Issues with the server, please seek IT support";
            echo "Error:" . $getPayment . "<br>" . $conn->error;
        }
            //Display's links to other actions
            echo "<a href='AddPayment.php'>Make a Payment</a>" . "<br/>";
            echo "<a href='Login.html'>Go Back</a>" . "<br/>";
        }

    /**
     * @param $books
     * @param $author
     * @param $amount
     */
    public static function ApprovePayment($books, $author, $amount){
            $status="Approved by Admin";
             //Gets the variable global from the include link
            global $conn;
            //SQL Query to insert an approved payment into the database
            $approvePayment=("INSERT INTO `Payment` (`PaymentID`, `Book`, `Author`, `Amount`, `Status`) VALUES (NULL, '$books', '$author', '$amount', '$status')");
            if ($conn->query($approvePayment) === TRUE) {
                echo "Payment Approved Successfully";
                //display's a link to another action
                echo "<a href='Login.html'>Go Back</a>" . "<br/>";
            } else {
                echo "Payment Request Failed! Please see an administrator";
                echo "Error:" . $approvePayment . "<br>" . $conn->error;
            }
            //Closes connection to the database
            $conn->close();

        }
    }
//Get data from the required forms and then passes it to the revelent method in the class get feedback
if(isset($_POST['AddPayment'])){
    $books=$_POST['books'];
    $author=$_POST['author'];
    $amount=$_POST['amount'];
    $worker = Payment::ProcessPayment($books, $author, $amount);
}
elseif(isset($_POST['payment'])){
    $books=$_POST['books'];
    $author=$_POST['author'];
    $amount=$_POST['amount'];
    $worker = Payment::RequestPayment($books, $author, $amount);
}
elseif(isset($_POST['getPayment'])){
        $newbook=$_POST['books'];
        $worker = Payment::GetPayment($newbook);
}
elseif (isset($_POST['ApprovePayment'])){
    $books=$_POST['books'];
    $author=$_POST['author'];
    $amount=$_POST['amount'];
    $worker = Payment::ApprovePayment($books, $author, $amount);
}
else{
    //if they landed on this page by accident redirect them to the login page
    header("Location:login.php");
}