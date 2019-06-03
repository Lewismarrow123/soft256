<?php
//Includes a connect to the database
include_once("DBConnection.php");
?>
<!--Date created: Monday 13th May 2019. Created By:Lewis Marrow. For Application:Soft256-->
<!--This page is used by a User to see if a payment is currently pending for a book-->
<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Exe River Publishing</title>
</head>
<body>
<h1>Get Payment</h1>
<p>Use the form below to display payments for your books</p>
<p>Please note credit will be taken from your virtual account when you pay</p>
<hr>
<form action="Payment.php" method="post">
    Book<br />
    <Select name="books">
        <!--Select all books from the database and display in a menu-->
        <?php
        $sql=("SELECT * FROM `Books`");
        $result=$conn->query($sql);
        if($result->num_rows>0) {
            while ($row = $result->fetch_assoc()) {
                $book=$row['Book'];
                echo "<option value='$book'>" . $row['Book'] . "</option>";

            }
        }
        ?>
    </Select>
    <br />
    <!--Submit this vaule to the Payment Class-->
    <input type="submit" name="getPayment">
</form>
</body>
</html>