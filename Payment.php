<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 2019-05-30
 * Time: 16:27
 */
include_once ("DBConnection.php");
Class Payment{

    public static function ProcessPayment($books, $author, $amount){
        $status="Paid";
        global $conn;
        $insertPayment=("INSERT INTO `Payment` (`PaymentID`, `Book`, `Author`, `Amount`, `Status`) VALUES (NULL, '$books', '$author', '$amount', '$status')");
        if ($conn->query($insertPayment) === TRUE) {
            echo "Payment Proccessed Successfully";
            echo "<a href='GetPayment.php'>SeePayments</a>" . "<br/>";
            echo "<a href='Login.html'>Go Back</a>" . "<br/>";
        } else {
           echo "Payment Failed! Please see an administrator";
            echo "Error:" . $insertPayment . "<br>" . $conn->error;
        }
        $conn->close();
        }

        public static function RequestPayment($books,$author,$amount){
        $status="Pending";
        global $conn;
        $requestpayment=("INSERT INTO `Payment` (`PaymentID`, `Book`, `Author`, `Amount`, `Status`) VALUES (NULL, '$books', '$author', '$amount', '$status')");
        if ($conn->query($requestpayment) === TRUE) {
            echo "Payment Requested Successfully";
            echo "<a href='Login.html'>Go Back</a>" . "<br/>";
        } else {
            echo "Payment Request Failed! Please see an administrator";
            echo "Error:" . $requestpayment . "<br>" . $conn->error;
        }
        $conn->close();
        }

        public static function GetPayment($newbook){
        global $conn;
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
            echo "<a href='AddPayment.php'>Make a Payment</a>" . "<br/>";
            echo "<a href='Login.html'>Go Back</a>" . "<br/>";
        }

        public static function ApprovePayment($books,$author,$amount){
            $status="Approved by Admin";
            global $conn;
            $approvePayment=("INSERT INTO `Payment` (`PaymentID`, `Book`, `Author`, `Amount`, `Status`) VALUES (NULL, '$books', '$author', '$amount', '$status')");
            if ($conn->query($approvePayment) === TRUE) {
                echo "Payment Approved Successfully";
                echo "<a href='Login.html'>Go Back</a>" . "<br/>";
            } else {
                echo "Payment Request Failed! Please see an administrator";
                echo "Error:" . $approvePayment . "<br>" . $conn->error;
            }
            $conn->close();

        }
    }

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
    echo"Error";
}