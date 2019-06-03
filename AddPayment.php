<!--Date created: Sunday 2nd June 2019. Created By:Lewis Marrow. For Application:Soft256-->
<!--This page is used by an Author to add a payment to the system that they owe from a book publishing/editing charge to a book-->
<!--This provides an initial link to the database file to add a connection to the database-->
<?php include_once("DBConnection.php");?>
<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Exe River Publishing</title>
</head>
<body>
<h1>Add Payment</h1>
<p>Use the form below to add a payment for a book</p>
<p>Please note credit will be taken from your virtual account</p>
<hr>
<form action="Payment.php" method="post">
    Book<br />
    <Select name="books">
        <!--Select's all Books from the database and then displays them in a drop down list for the user to select a book of there choice-->
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
    <Select name="author">
        <!--Select's all Authors from the database and then displays them in a drop down list for the user to select themselves-->
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
    Payment Amount<br />
    <input type="text" name="Amount">
    <br />
    <br />
    <!--Submit's the data to the Payment class for processing-->
    <input type="submit" name="AddPayment">
</form>
</body>
</html>