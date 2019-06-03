<?php
//Includes the link to the database connection
include_once("DBConnection.php");
?>
<!--Date created: Thursday 30th May 2019. Created By:Lewis Marrow. For Application:Soft256-->
<!--This page is used by a User to request a payment for a book-->
<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Exe River Publishing</title>
</head>
<body>
<h1>Request Payment</h1>
<p>Use the form below to request Payment for a book</p>
<hr>
<section>
    <form action="Payment.php" method="post">
        Book<br />
        <Select name="books">
            <!--Get books from database-->
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
        </br>
        Author<br/>
        <!--Get Author from database-->
        <Select name="author">
            <?php
            $sql=("SELECT * FROM `Users` WHERE `UserRole` = 'author'");
            $result=$conn->query($sql);
            if($result->num_rows>0) {
                while ($row = $result->fetch_assoc()) {
                    $uname=$row['Username'];
                    echo "<option value='$role'>" . $row['Username'] . "</option>";
                }
            }
            ?>
        </Select>
        </br>
        <!--Get payment and pass information to the Payment Class-->
        Payment Amount<br />
        <input type="text" name="Amount">
        <br />
        <br />
        <input type="submit" name="payment">
    </form>
</body>
</html>